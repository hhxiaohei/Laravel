<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pro;
use Auth;

class IndexController extends Controller
{
    public function index(){
        $res = Pro::where('status','=',1)->orderBy('pid','desc')->take(3)->get();
        return view('index',['res'=>$res]);
    }
    public function mi(){
        echo 'middleware';
    }
    //sms
    public function sms(Request $request,$mobile){
        require_once (base_path().'/vendor/dayu/TopSdk.php');
        $c = new \TopClient;
        $appkey = '';
        $secret = '';
        $c->appkey = $appkey;
        $c->secretKey = $secret;
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("点点点购物网站");
        $rand = mt_rand(1000,9999);
        //将验证码放入session
        $request->session()->put('smscode',$rand);
        $req->setSmsParam("{\"name\":\"欢迎注册点点点\",\"uid\":\"$rand\"}");
        $req->setRecNum($mobile);
        $req->setSmsTemplateCode("");
        $resp = $c->execute($req);
        return $rand;
        //var_dump($resp);
    }

    //校验短信验证码
    public function checkSms(Request $request){
        return $request->session()->get('smscode');
    }
}
