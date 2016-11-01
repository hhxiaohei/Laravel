<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','IndexController@index');
Route::get('home','IndexController@index');

//reg  laravel自带的
Route::get('register','UserController@getRegister');
Route::post('register',['middleware'=>'App\Http\Middleware\EmailMiddleware','uses'=>'UserController@postRegister']);

//login laravel自带的
Route::get('login','UserController@getLogin');
Route::get('auth/login','UserController@getLogin');
Route::post('auth/login',['middleware'=>'App\Http\Middleware\EmailForLoginMiddleware','uses'=>'UserController@postLogin']);
Route::post('login',['middleware'=>'App\Http\Middleware\EmailForLoginMiddleware','uses'=>'UserController@postLogin']);

//logout laravel自带的
Route::get('logout','Auth\AuthController@getLogout');

//借款
Route::get('jie','ProjectController@getJie');
Route::post('jie','ProjectController@postJie');

//列表
Route::get('list','CheckController@getList');

//审核
Route::get('check/{pid}','CheckController@getCheck');
Route::post('check/{pid}','CheckController@postCheck');

//投标
Route::get('pro/{pid}','ProjectController@pro');
Route::post('pro/{pid}',['middleware'=>'App\Http\Middleware\EmailForProMiddleware','uses'=>'ProjectController@postPro']);

//run
Route::get('payrun','GrowController@run');

//我的账单
Route::get('myzd','ProjectController@myzd');

//我的投资
Route::get('mytz','ProjectController@mytz');

//我的收益
Route:;get('mysy','ProjectController@mysy');

//中间件测试(匿名函数)
Route::get('/middle',['middleware'=>'App\Http\Middleware\EmailMiddleware',function(){
    echo '匿名函数';
}]);
//中间层测试(调用Controller)
Route::get('/mi',['middleware'=>'App\Http\Middleware\EmailMiddleware','uses'=>'IndexController@mi']);

//支付
Route::post('pay/{pid}','ProjectController@pay');
//测试支付
Route::get('pay',function(){
    $row = [];
    $row['v_amount'] = '0.01';
    $row['v_moneytype'] = 'CNY';
    $row['v_oid'] = date('Ymd',time()).mt_rand(1000,9999);
    $row['v_mid'] = '20272562';//这个是商户号
    $row['v_url'] = 'http://d3.com/home/';
    $row['key'] = '%()#QOKFDLS:1*&U';
    //将上述的拼接并转大写
    $row['v_md5info'] = strtoupper(md5(implode('',$row)));
    return view('pay',['row'=>$row]);
});

//微博接口测试
Route::get('wb','weiboController@index');
//短信验证码
Route::get('sms/{mobile}','IndexController@sms');
//校验短信验证码
Route::get('check','IndexController@checkSms');