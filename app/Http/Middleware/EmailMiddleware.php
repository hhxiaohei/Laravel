<?php

namespace App\Http\Middleware;

use Closure;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

class EmailMiddleware
{
    public function handle($request, Closure $next)
    {
        $rs = $next($request);
        if($request->user()){
            $mail = new Message;
            $mail->setFrom('点点贷官方网站 <@163.com>')
                ->addTo($request->user()->email)
                ->setSubject('欢迎注册点点贷')
                ->setBody("用户名:".$request->user()->name);
            $mailer = new SmtpMailer([
                'host' => 'smtp.163.com',
                'username' => '',
                'password' => ''
            ]);
            $mailer->send($mail);
        }
        return $rs;
    }
}
