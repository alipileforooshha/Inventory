<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['username'=>$request->username, 'password' => $request->password])){
            return redirect('dashboard');
        }else{
            return back()->with('error','اطلاعات ورود صحیح نمیباشد');
        }
    }

    // public function register(){
    //     $user = User::create([
    //         'username' => 'mosque_admin',
    //         'password' => Hash::make('mosque1400pass')
    //     ]);
    //     if($user){
    //         dd('success');
    //     }
    // }
}
