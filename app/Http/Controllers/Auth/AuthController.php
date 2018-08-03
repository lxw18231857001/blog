<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\ThirdLogin;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    public function weibo()
    {
        return Socialite::driver('weibo')->redirect();
        // return \Socialite::with('weibo')->scopes(array('email'))->redirect();
    }


    public function callback()
    {
        $code=request('code');
//        dd($code);
        $oauthUser = Socialite::driver('weibo')->user();
        $sina_id = (int)$oauthUser->getId();
        $name = $oauthUser->getName();
        $nickname = $oauthUser->getNickname();
        $email = $oauthUser->getEmail();
        $sina_avatar= $oauthUser->getAvatar();

        $where['sina_id']=$sina_id;
        if (!$userDetail=ThirdLogin::where($where)->first()){
            $user=ThirdLogin::create(compact('sina_id','name','nickname','email','sina_avatar'));
            $this->third_login($user);
        }else{
            $this->third_login($userDetail);
        //  return Redirect::back()->withErrors('微博用户'.$userDetail->nickname.'已存在');
        }



    }

    public function third_login($user)
    {
        dd($user);
        if (\Auth::login($user, $remember = true)) {
            return redirect('/posts');
        }
    }
}