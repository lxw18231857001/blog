<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('admin.login.index');
    }

    //登录逻辑
    public function login()
    {

        $this->validate(\request(), [
            'name' => 'required|min:3',
            'password' => 'required',
            'captcha' => 'required|captcha',  //后面的这个captcha，是验证的不用写逻辑
        ]);

           $adminUser=request(['name','password']);
           if(\Auth::guard('admin')->attempt($adminUser)==true){
               return redirect('/admin/index');
           }
           return  \Redirect::back()->withErrors('账号密码不匹配');
    }


    //登出
    public function logout()
    {
        \Auth::logout();
        return \redirect('/admin/login');
    }
}


