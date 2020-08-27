<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\User;
use App\Interfaces\IUser;

class AuthController extends Controller
{

    protected $userService;

    public function __construct(IUser $u) {
        $this->userService = $u;
    }

    public function register(Request $request)
    {
        $validar = Validator::make($request->all(), [
            'name' => 'required|between:2,100',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|string|min:6',
        ]);
        if ($validar->fails()) {
            return response()->json($validar->errors(), 422);
        }
        $user = $this->userService->criarUsuario($request->name, $request->password, $request->email, 'seller');
        return response()->json([
            'message' => 'Registrado com sucesso',
            'user' => $user,
            'status' => 'success'
        ], 200);
    }

    public function login(Request $request)
    {
        $validar = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validar->fails()) {
            return response()->json($validar->errors(), 422);
        }

        if (!$token = auth('api')->attempt($validar->validated())) {
            return response()->json(['error' => 'Não autorizado'], 401);
        }

        return response()->json(['status' => 'successs'], 200)->header('Authorization', $token);
    }

    public function logout()
    {
        $this->guard('api')->logout();
        return response()->json(['status' => 'success'], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard('api')->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    protected function gerarToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    private function guard()
    {
        return Auth::guard('api');
    }
}
