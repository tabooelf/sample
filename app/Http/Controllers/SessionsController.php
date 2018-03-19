<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }

    public function create(){
        if(Auth::check()){
            session()->flash('warning', '请勿重复登陆');
            return redirect()->back();
        }
        return view('sessions.create');
    }

    public function store(Request $request){
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:50',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($credentials, $request->has('remember'))){
            if (Auth::user()->activated) {
                session()->flash('success', '欢迎回来');
                return redirect()->intended(route('users.show', [Auth::user()]));
            }else{
                Auth::logout();
                session()->flash('warning', '您的账号未激活,请检查邮箱中的注册邮件进行激活');
                return redirect('/');
            }
        } else {
            session()->flash('danger', '登陆失败,请检查邮箱和密码是否正确');
            return redirect()->back();
        }
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success', '您已经成功退出');
        return redirect('login');
    }

}
