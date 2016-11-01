<html><head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">


<meta content="all" name="robots">
<meta charset="utf-8">
<title>借款管理-项目审核</title>
<meta content="点点贷、借出、借款" name="keywords">
<meta content="点点贷" name="description">
    
<meta content="no-cache" http-equiv="pragma">
<meta content="no-cache" http-equiv="cache-control">
<meta content="0" http-equiv="expires">


<link type="text/css" rel="stylesheet" href="/css/common.css"> 
<link type="text/css" rel="stylesheet" href="/css/sea.css">
<link type="text/css" rel="stylesheet" href="/css/style.css">

</head>

<body style="display: block;">
@include('comm.head');
<!--面包屑-->
<div class="crumbs userCrumbs">
    <a class="first" href="#">账户中心</a><span>&gt;</span><a class="two" href="#">借款管理</a><span>&gt;</span><a class="two">借款记录</a>
</div>
<!--面包屑 end-->
<!--layout start-->
<div class="layout clearfix page46">
    <!--left nav start-->
<!--left nav start-->
	<div class="clearfix leftbar">
    	<div class="clearfix left_nav">
        	<!--user_nav start-->
        	<div class="clearfix user_nav" id="leftMenuContainer"><a href="#"><h3><i class="ico1"></i>账户中心</h3></a><h4><span>资金管理</span><i></i></h4><ul style="display:block;" pdata="zjglElem" id="zjglElem"><li pdata="my_nwd_3" id="my_nwd_3"><a href="#">我要充值</a></li><li pdata="my_nwd_4" id="my_nwd_4"><a href="#">我要提现</a></li><li pdata="my_nwd_5" id="my_nwd_5"><a href="#">资金记录</a></li><li pdata="my_nwd_6" id="my_nwd_6"><a href="#">收益明细</a></li></ul><h4><span>投资管理</span><i></i></h4><ul style="display:block;" pdata="tzglElem" id="tzglElem"><li pdata="tz_nwd_2" id="tz_nwd_2"><a href="#">嘉财有道</a></li><li pdata="tz_nwd_8" id="tz_nwd_8" class="rela"><a href="#">嘉猜宝</a></li><li pdata="tz_nwd_1" id="tz_nwd_1"><a href="#">我的债权</a></li><li pdata="tz_nwd_5" id="tz_nwd_5"><a href="#">债权转让</a></li><li pdata="tz_nwd_7" id="tz_nwd_7" class="rela"><a href="#">体验专区</a></li><li pdata="tz_nwd_4" id="tz_nwd_4" class="rela"><a href="#">电子对账单</a></li><li pdata="tz_nwd_3" id="tz_nwd_3"><a href="#">智能抢标</a></li></ul><h4><span>借款管理</span><i></i></h4><ul style="display:block;" pdata="jkglElem" id="jkglElem"><li pdata="jk_nwd_5" id="jk_nwd_5"><a href="#">我要还款</a></li><li pdata="jk_nwd_4" id="jk_nwd_4"><a href="#">借款记录</a></li><li pdata="jk_nwd_6" id="jk_nwd_6"><a href="#">借款申请</a></li></ul><h4><span>账户管理</span><i></i></h4><ul style="display:block;" pdata="zhglElem" id="zhglElem"><li pdata="xinxi_nwd_1" id="xinxi_nwd_1"><a href="#">个人资料</a></li><li pdata="xinxi_nwd_9" id="xinxi_nwd_9"><a href="#">我的积分</a></li><li class="weiyi" pdata="xinxi_nwd_8" id="xinxi_nwd_8"><a href="#">安全中心</a></li><li pdata="xinxi_nwd_7" id="xinxi_nwd_7"><a href="#">账户绑定</a></li><li pdata="xinxi_nwd_4" id="xinxi_nwd_4"><a href="#">消息中心</a></li></ul><h4><span>活动管理</span><i></i></h4><ul style="display:block;" pdata="hdglElem" id="hdglElem"><li pdata="xinxi_nwd_6" id="xinxi_nwd_6"><a href="#">我的礼品</a></li><li pdata="tj_nwd_4" id="tj_nwd_4"><a href="#">推荐有奖</a></li><li pdata="tj_nwd_1" id="tj_nwd_1"><a target="_blank" href="#">我要推荐</a></li></ul></div>
            <!--user_nav end-->
    	</div>
    		    	<div class="banner_out">
		            <div class="user_banner">
			                <div class="img">
			                    <ul>
			                    </ul>
			                </div>
		            <div class="page"></div></div>
	        </div>
    </div>
    <!--left nav end-->
    
<!--left nav end-->
    <!--right start-->
    <div class="clearfix main_wrapper">
    	<div class="container">
            <div class="clearfix fluid mb_10">
            	<div class="module">
                    <div class="clearfix tab_content">
                    	<!--1-->
                        <div class="clearfix nr">
                            <!--table-->
                            <form action="" method="post">
                            <table class="table" >
                                <tbody>
                                    <tr>
                                        <td>项目名称:</td>
                                        <td><input type="text" name="name"></td>
                                    </tr>
                                    <tr>
                                        <td>真实姓名:</td>
                                        <td><input type="text" name="title" value="{{$att->realname}}"></td>
                                    </tr>
                                    <tr>
                                        <td>性别:</td>
                                        <td>
                                            <select name="gender">
                                            <option value="1">男</option>
                                            <option value="0">女</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>婚否:</td>
                                        <td>
                                            <select name="marry">
                                            <option value="1">已婚</option>
                                            <option value="0">未婚</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>借款金额:</td>
                                        <td><input type="text" name="money" value="{{$pro->money/100}}"></td>
                                    </tr>
                                    <tr>
                                        <td>借款期限:</td>
                                        <td>
                                            <select name="hrange">
                                            <option value="3">3个月</option>
                                            <option value="6">6个月</option>
                                            <option value="9">9个月</option>
                                            <option value="12">12个月</option>
                                            <option value="18">18个月</option>
                                            <option value="24">24个月</option>
                                            <option value="36">36个月</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>利率:</td>
                                        <td>
                                            <select name="rate">
                                            <option value="6">6%</option>
                                            <option value="8">8%</option>
                                            <option value="10">10%</option>
                                            <option value="12">12%</option>
                                            <option value="15">15%</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>借款人基本信息:</td>
                                        <td>
                                            <textarea name="udesc" id="" cols="30" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>审核结果:</td>
                                        <td>
                                            <select name="status">
                                            <option value="1">通过</option>
                                            <option value="-1">拒绝</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            {!! csrf_field() !!}
                                            <input type="submit" value="提交"></td>
                                    </tr>
                                </tbody>
                            </table>
                            </form>
                            <!--table end-->
                            <div class="t_foot">
                                
                                <div class="r">
                            	<div class="fy">
                                	<!--分页 str -->
                            	</div>
                        		</div>
                                
                          </div>
                            <div class="tongji tj_nr01" id="tongji">
                            	待还本息 &nbsp;&nbsp;共 <span class="fc_orange bold" id="waitCapital"></span> 元，
                            	应还罚息  共 <span class="fc_green bold" id="shouldFine"></span> 元 	
                            </div>
                            
                      </div>
                     
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- right end -->
</div>
<!--layout end-->

<!--提示start-->
<div style="display: none;" id="openMsg" class="plusBank mini page53"> 
	<div class="topper clearfix"> 
		<span id="msgTitle" class="fl fs_18">提示</span> 
		<a id="msgCloseAll" class="fr"></a> 
	</div> 
	<div id="changyong" class="middle"> 
		<div id="msgContent" class="content"></div> 
		<div class="btnbox"><button id="msgClose" class="btn btnSize_1 btn_blue plus_c">确认</button></div> 
	</div> 
</div>
<!--提示end-->

@include('comm.foot');
<link rel="stylesheet" href="/css/grey2013.css">

<!--时间  s-->

<link type="text/css" rel="stylesheet" href="/css/jquery-ui.css">
<!--时间  e-->
<!---静态化 - 头部内容---->
</body></html>