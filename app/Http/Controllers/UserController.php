<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use Gregwar\Captcha\CaptchaBuilder;



class UserController extends AuthController
{
    //登陆
    public function getRegister()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        //验证码生成
        $imageCode = $builder->inline();
        //验证码写入session
        //方法一:用request方法
        //$req = request();
        //$req->session()->put('imageCode',$builder->getPhrase());
        //方法二:直接用session方法
        session(['imageCode'=>$builder->getPhrase()]);
        return view('auth.register',['imageCode'=>$imageCode]);
    }
    //验证验证码
    public function postRegister(Request $request)
    {
        //校验  验证码的 session
        if($request->imgcode == $request->session()->get('imageCode')){
            //验证OK
            parent::postRegister($request);
            return redirect('/');
        }else{
            //验证error
            return back();
        }
    }
}
