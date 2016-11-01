<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="robots" content="all">
<meta charset="utf-8">
<meta name="description" content="点点贷贷款专栏专注于为个人和企业提供2013年最新的贷款利息查询、小额贷款、个人贷款、商业贷款、短期借款期限、汽车抵押贷款、房屋抵押贷款、信用贷款、申请贷款条件等贷款咨询服务。">
<meta name="keywords" content="贷款利率,小额贷款,无抵押贷款,p2p贷款，借钱,长期借款">
<title>快速申请 -点点贷</title>
<meta name="Robots" content="index,follow">
<meta property="wb:webmaster" content="ac04ec3477e29c81">
<meta property="qc:admins" content="1533374623661774116375">

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">


<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/sea.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="/css/webstyle2.css">
<link href="/css/wyjk.css" rel="stylesheet" type="text/css">
<link href="/css/grey2013.css" rel="stylesheet">
<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
<style>
    .foot1 .out .r .line2{
        margin-top: 0;
    }
    .foot2 .out .line2{
        border-bottom: none;
        margin-top: 0;
    }
</style>
</head>

<body>
@include('comm.head');
<form id="applyForm" name="applyForm" action="{{url('jie')}}" method="post">
    <div class="application">
        <figure class="banner"></figure>
        <div class="delCon">
            <h1>快速申请</h1>
            <div class="iptBox">
                <span>真实年龄</span>
                <select class="ageBox" id="age" name="age">
                    <option selected="selected" value="0">请选择年龄段</option>
                    <option value="15">23岁以下</option>
                    <option value="40">23岁-55岁</option>
                    <option value="80">55岁以上</option>
                </select>
                @if($errors->has('age'))
                <p id="ageError" class="error" style="display: block">{{$errors->first('age')}}</p>
                @endif
            </div>

            <div class="iptBox">
                <input type="hidden" name="_token" value="9TtiNh3RoDkpogM6p4aeaHj1bYeBPpgtIDTuXiqA">
                <span>借款金额</span>
                <input id="loanAmount" name="money" maxlength="8" placeholder="请输入借款金额" type="text" value="">
                @if($errors->has('money'))
                <p style="display: block;" id="amountError" class="error">{{$errors->first('money')}}</p>
                @endif
            </div>
            <div class="iptBox">
                <span>手机号码</span>
                <input id="mobile" name="mobile" placeholder="请输入手机号码" maxlength="11" type="text">
                @if($errors->has('mobile'))
                <p id="mobileError" class="error" style="display: block">{{$errors->first('mobile')}}</p>
                @endif
            </div>
            <div class="iptBox">
                <span class="message">短信验证码</span>
                <input class="short" name="imgcode" id="smscode" placeholder="请输入短信验证码" type="text">
                <button id="smsbutton" style="background:#fff;border: 1px #ccc solid;width: 110px;height: 30px;float: right;line-height: 30px;margin-left: 10px;padding: 3px;border-radius:3px;cursor:crosshair">点击获取验证码</button>
                <p id="imgcodeError" class="error" style="display: none">短信验证码错误，请重新输入</p>
            </div>
            <div class="iptBox">
                <span class="message">真实姓名</span>
                <input class="short" name="realname" id="realname" placeholder="请输入真实姓名" type="text">
                @if($errors->has('name'))
                <p id="imgcodeError" class="error" style="display: block;">{{$errors->first('name')}}</p>
                @endif
            </div>
            {!! csrf_field() !!}
            <input class="applyBtn" value="立即申请" id="save" type="submit">
        </div>
    </div>
</form>
@include('comm.foot');
<script src="/js/jquery.js"></script>
<script>
    //短信验证码
    $('#smsbutton').click(function(){
        patt = /0?(13|14|15|18|17)[0-9]{9}/
        if(!patt.test($('#mobile').val())){
            alert('手机号格式非法');
            return false;
        }
        var mobile = $('#mobile').val();
        //防止再点击
        this.disabled = true;
        var btn = this;
        var sec = 60;
        var clock = null;
        clock = setInterval(function(){
            --sec;
            if(sec >= 0){
                btn.innerHTML = sec;
            }else{
                btn.innerHTML = '点击获取验证码'
                btn.disabled = false;
                clearInterval(clock);
            }
        },1000);
        $.get('/sms/'+mobile,function(res){
        },'json')
    });
    $('#applyForm').submit(function(){
        var patt  = '';
        if($('#age').val == '0'){
            alert('必须填写年龄');
            return false;
        }
        patt = /^[1-9]\d+$/
        if(!patt.test($('#loanAmount').val())){
            alert('输入的金额必须是整数');
            return false;
        }
        patt = /0?(13|14|15|18|17)[0-9]{9}/
        if(!patt.test($('#mobile').val())){
            alert('手机号格式非法');
            return false;
        }
        patt = /^[\u4e00-\u9fa5]+$/
        if(!patt.test($('#realname').val())){
            alert('必须填写真实姓名');
            return false;
        }
        var smscode1;
        //验证验证码
        $.ajax('/check',{
            //ajax同步
            'async':false,
            'success':function(msg){
                smscode1 = msg;
            }
        });
        //验证失败
        if(smscode1!= $('#smscode').val()){
            alert('验证码不正确');
            return false;
        };
    })
</script>
</body></html>