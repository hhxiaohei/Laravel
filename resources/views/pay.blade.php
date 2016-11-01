<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<title>资金管理-我要充值</title>


<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">


<link href="/css/common.css" rel="stylesheet" type="text/css"> 
<link href="/css/sea.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">

<link href="/css/grey2013.css" rel="stylesheet"> 

<!--时间  s-->

<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"> 

<!--时间  e-->
 
<!---静态化 - 头部内容---->


<link href="/css/forms_style.css" rel="stylesheet" type="text/css">

<style type="text/css">
.plusBank5{width:680px; height:500px;  margin-left:-340px; margin-top:-250px;_margin-top:-250px;}
.serviceFeeTR{
	display:none;
}
</style>
</head>

<body style="display: block;">
@include('comm.head');
 
  <!--红包抵扣金额-->
  <!--手续费-->
  
  <!--本期次理财金最低投资金额-->
  <!--本期次理财金最高投资金额-->
  
  
   
  
<div class="clearfix"></div>
<!--layout start-->
<div class="main page215 clearfix" style="min-height:230px">
	<!--content start-->
	<div class="pt_20 fluid">
        <div class="module buy_page" style="padding:0;width:100%; float:left;">
        	<!--top s-->
            <div class="clearfix buy_box" style="background:#fff;">

                <div class="fr r" style="width:310px;">

							{{--在线支付--}}
							<form method=post action="http://d3.com/pay2/index.php">
								<p><input type=hidden name=v_mid value="{{$row['v_mid']}}"></p>
								<p>订单编号:<input type=text name=v_oid value="{{$row['v_oid']}}"></p>
								<p>订单总金额<input type=text name=v_amount value="{{$row['v_amount']}}"></p>
								<p><input type=hidden name=v_moneytype value="{{$row['v_moneytype']}}"></p>
								<p><input type=hidden name=v_url value="{{$row['v_url']}}"><p>
								<p><input type=hidden name=v_md5info value="{{$row['v_md5info']}}"><p>
									{!! csrf_field() !!}
									<input type="submit" name="name" value="支付">
                </div>
                <!--r e-->
               
            </div>
            </div>
            <div class="fluid">

            <!-- tab out s-->

        
    </div>
            <!--tab out end-->
            
        </div>
    </div>
    <!--content end-->

</div>
<!--layout end-->

 <!-- 遮盖层 -->
<!--地域选择银行start-->

<!--地域选择银行end-->

@include('comm.foot');
</body></html>