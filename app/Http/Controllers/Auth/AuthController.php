<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // view login
    public function viewLogin(){
        return view('login');
    }

    public function login(LoginRequest $request){
        
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            // re check role redirect admin or homepage

            if(Auth::user()->role != 0){
                return redirect()->route('admin.dashboard'); 
            }   
            return redirect()->route('client.home'); 
        }
        return redirect()->back()->with('msg-er','Tài khoản hoặc mật khẩu không chính xác!');            
    }

    // view register
    public function viewRegister(){
        return view('register');
    }

    public function register(RegisterRequest $request){
        if($request->password != $request->password_confirm){
            return redirect()->back()->with('msg-er','Mật khẩu không khớp!');
        }

        $user  = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);

        try{
            $user->save();

            return redirect()->route('login')->with('msg-suc','Tạo thành công tài khoản');
        }catch(\Throwable $e){
            report($e);
            return false;
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
