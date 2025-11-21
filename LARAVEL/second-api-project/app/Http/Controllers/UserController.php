<?php
// Desde aqui se gestiona la logica de los usuarios
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Aqui se registran los usuarios
    public function register(Request $request){
        //validamos los datos de entrada
        try{
        $request->validate([
            'name' => 'required|string|max:255|unique:users|alpha|min:3|regex:/^[A-Za-z]+$/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        //creamos el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
             'user' => $user,
             'status' => 201
            ],201);
        }catch(Exception $error){
            return response()->json([
                'message' => 'Registration failed',
                 'error' => $error->getMessage()
                ]); 
        }
    }
    public function login(Request $request){
        //validamos los datos de entrada
        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);

        //extraemos solo los datos que vamos a necesitar
        $credentials = $request->only('email', 'password');

        //Intentamos autenticar al usuario con las credenciales
        //Auth nos permite manejar la autenticacion en Laravel y devuelve true o false
        //attempt intenta autenticar al usuario
        if(Auth::attempt($credentials)){
            //Si las credenciales funcionaron obtenemos el usuario
            $user = $request->user();
            //generamos un token de acceso para el usuario
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
                'status' => 200
                ],200);
        }
    }
}
