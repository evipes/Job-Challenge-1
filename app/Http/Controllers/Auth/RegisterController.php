<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\UserDocuments;
use App\Notifications\Inform;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Response;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {

        return '/';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['nullable', Rule::requiredIf($data['type'] == 'cpf'), 'cpf'],
            'cnpj' => ['nullable', Rule::requiredIf($data['type'] == 'cnpj'), 'cnpj'],

        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            DB::beginTransaction();
            // Criando usuário
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Criando documentos e relacionando-os com o usuário criado
            UserDocuments::create([
                'type' => $data['type'],
                'number' => isset($data['cpf']) ? $data['cpf'] : $data['cnpj'],
                'user_id' => $user->id,
            ]);

            // Definindo papel do usuário
            $user->assignRole('vendedor');
            DB::commit();
            
            // enviando email de boas vindas para o novo usuário
            $user->notify(new Inform(
                $user,
                $subject = "Inscrição na Evipes",
                $text = "Você acabou de se inscrever para poder trabalhar usando nossa plataforma! Parabéns como isso
            você terá vários benefícios, alguns deles são: transações seguras, aumento do número de vendas
            e muitos outros!!"
            ));
            // Retornando usuário
            return $user;
        } catch (\Exception $e) {
            return response()->json(['error_login', "Erro ao realizar cadastro! Favor entrar em contato com o nosso suporte."]);
            DB::rollBack();
        }
    }



    // Recriando rota register
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            // Retornando erros 
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()), 400);
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
    }

    // Função para retornar a view register
    public function showRegistrationForm($codigo = '')
    {
        return view('auth.register');
    }
}
