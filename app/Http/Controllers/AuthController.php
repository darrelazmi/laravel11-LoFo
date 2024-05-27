<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function regprocess(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'nim' => ['required', 'max:11', 'string'],
            'password' =>  ['required', 'min:8', Password::default()],
            'email' =>'required|email|unique:users',
            'phone' =>'required|unique:users'
        ]);

        $newuser = User::create($data);

        return redirect()->route('login.index');
    }

    public function logprocess(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            return redirect()->route('home.index');
        }
        else{
            return redirect()->route('login.index');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect(route('login.index'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('login.index');
    }
}
