<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Home(){
        return view('Auth.register');
    }

    public function Login(){
        return view('Auth.login');
    }

    public function register(Request $request){
        // return $request;
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,employee',
        ]);

            $user = new User();
            $user->name = $validation['name'];
            $user->email = $validation['email'];
            $user->password = Hash::make($validation['password']);
            $user->role = 'employee';   
            $user->save();     
        return redirect()->back()->with('success','Account Created Successfully');
    }

    public function loginuser(Request $request){
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        logger()->info('Login Attempt:', ['email' => $request->email]);
    
        if(Auth::attempt($request->only(['email', 'password']))){
            $user = Auth::user();
            // logger()->info('Login Successful:', ['user' => $user]);
    
            if($user->role === 'admin'){
                return redirect()->route('companies.index');
            } else if($user->role === 'employee'){
                return redirect()->route('employee_index'); 
            } else {
                return redirect()->route('home');
            }
        }
    
        return redirect()->back()->with('error','Invalid Credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
    
    
}
