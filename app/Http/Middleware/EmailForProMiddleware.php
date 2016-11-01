<?php

namespace App\Http\Middleware;

use Closure;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
class EmailForProMiddleware
{
    /**
     * 购买以后的产品支付
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rs = $next($request);
        if($request->user()){
            $mail = new Message;
            $mail->setFrom('点点贷官方网站 <hhzhanghongyi@163.com>')
                ->addTo($request->user()->email)
                ->setSubject('点点贷理财——金九银十，理财正当时！@官网')
                ->setBody("<h1>点点贷理财——金九银十，理财正当时！@官网</h1><br>用户名:".$request->user()->name.',共购买产品'.$request->v_amount.'元,'.'产品单号:'.$request->v_oid);
            $mailer = new SmtpMailer([
                'host' => 'smtp.163.com',
                'username' => 'hhzhanghongyi',
                'password' => 'qq350000225621'
            ]);
            $mailer->send($mail);
        }
        return $rs;
    }
}
