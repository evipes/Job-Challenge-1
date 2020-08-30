<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\UserDocuments;
use App\Notifications\Inform;


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
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['nullable', Rule::requiredIf($data['type'] == 'cpf'), 'cpf'],
            'cnpj' => ['nullable', Rule::requiredIf($data['type'] == 'cnpj'), 'cnpj'],

        ]);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
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

        // enviando email de boas vindas para o novo usuário
        $user->notify(new Inform(
            $user,
            $subject="Inscrição na Evipes",
            $text="Você acabou de se inscrever para poder trabalhar usando nossa plataforma! Parabéns como isso
            você terá vários benefícios, alguns deles são: transações seguras, aumento do número de vendas
            e muitos outros!!"
        ));
        // Retornando usuário
        return $user;
    }

    public function showRegistrationForm($codigo = '')
    {
        return view('auth.register');
    }
}
