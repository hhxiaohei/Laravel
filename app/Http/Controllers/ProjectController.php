<?php

namespace App\Http\Controllers;

use App\Grow;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Auth;
use DB;
use App\Att;
use App\Pro;
use App\Bid;
use App\Hks;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];
    public function getJie(){
        return view('Project.woyaojiekuan');
    }

    public function postJie(Request $res){
        $att = new Att();
        $pro = new Pro();
        //dd($res->user()->name);
        //借款表单自动验证,多个验证规则用竖线隔开
        $validate = Validator::make($res->all(),[
            'age'=>'required|in:15,40,80',
            'money'=>'required|digits_between:2,7',
            'mobile'=>'required|regex:/^1[3578]\d{9}$/'
        ],[
                'age.required'=>'必须选择年龄',
                'money.required'=>'金额必须写',
                'money.digits_between'=>'金额范围错误',
                'in'=>'选择范围必须在values范围内',
                'mobile.required'=>'必须填写真实手机号',
                'mobile.regex'=>'不符合要求'
            ]
        );
        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }
        //user
        $pro->uid = $res->user()->uid;
        $att->uid = $res->user()->uid;
        $pro->name = $res->user()->name;
        //realname
        $att->realname = $res->realname;
        //age
        $att->age = $res->age;
        //money(分为单位)
        $pro->money = 100*$res->money;
        //mobile
        $pro->mobile = $res->mobile;
        //pubtime
        $pro->pubtime = time();
        $pro->save();
        $att->pid = $pro->pid;
        if($att->save()){
            return redirect('/');
        }else{
            return 'False';
        }
    }

    public function pro(Request $req,$pid){
        $res = Pro::where('pid','=',$pid)->first();
        return view('lijitouzi',['p'=>$res]);
    }

    public function postPro(Request $req,$pid){
        if(empty($_POST)){
            return view('lijitouzi');
        }else{
            //支付验证
            $md5 =$req->v_oid . $req->v_pstatus . $req->v_amount . $req->v_moneytype .'%()#QOKFDLS:1*&U';
            $md5 = strtoupper(md5($md5));
            $new_md5 = $req->v_md5str;
            if($md5!=$new_md5){
                die('验证失败');
            }
            $pro = Pro::find($pid);
            $user = Auth::user();
            $bid = new Bid();
            $ok = $pro->money/100;
            if(($req->v_amount) > $ok){
                return '投资失败';
            }else{
                $bid->uid = $user->uid;
                $bid->pid = $pid;
                $bid->title = $pro->title;
                $bid->money = $req->v_amount*100;
                $bid->pubtime = time();
                $bid->save();
                //更新pro表
                $pro->recive = $pro->recive + $req->v_amount*100;
                $pro->save();
                //dd($pro->recive);

                //筹集到的款等于需要的总金额
                if($pro->recive == $pro->money){
                    $this->myDone($pid);
                }
                if($pro->save()){
                    return redirect('/');
                }
            }
        }
    }
    protected function myDone($pid){
        $pro = Pro::find($pid);
        //1.修改项目状态为2
        $pro->status = 2;
        $pro->save();
        //2.为借款者,生成还款记录 按月
        $amout = ($pro->money*$pro->rate/1200) + ($pro->money / $pro->hrange);//每月还款
        //循环获取每月需要还多少
        $today = date('Y-m-d');
        for($i=1;$i<=$pro->hrange;$i++){
            $paydate = date('Y-m-d',strtotime("+ $i months"));
            $row = array(
                'uid'=>$pro->uid,
                'pid'=>$pro->pid,
                'title'=>$pro->title,
                'amout'=>$amout,
                'paydate'=>$paydate,
                'status'=>0//未还状态
            );
            //插入数据库
            DB::table('hks')->insert($row);
        }

        //3.为投资者,生成收益任务 按日,随时可以提走
        //3.1.每天应该给谁收益,然后定时任务  tasks表
        // 先从bid取出数据
        $bids = Bid::where('pid',$pid)->get();
        $row = [];
        $row['pid'] = $pid;
        $row['title'] = $pro->title;
        //变量外包一个大括号,没有什么意思,只是个变量的边界
        $row['enddate'] = date('Y-m-d',strtotime("+ {$pro->hrange} months"));
        foreach($bids as $bid){
            $row['uid'] = $bid->uid;
            //每天的利息
            $row['amount'] = $bid->money * $pro->rate/36500;
            //写入table tasks
            DB::table('tasks')->insert($row);
        }
    }
    //我的账单
    public function myzd(){
        //$hks = Hks::all()->paginate(5);
        $hks = DB::table('hks')->paginate(5);
        return view('myzd',['hks'=>$hks]);
    }
    //我的投资
    public function mytz(){
        $user = Auth::user();
        $bid = Bid::where('bids.uid',$user->uid)->whereIn('status',[1,2])->join('projects','bids.pid','=','projects.pid')->get(['bids.*','projects.status']);
        //return $bids;
        return view('mytz',['bid'=>$bid]);
    }
    //我的收益
    public function mysy(){
        $user = Auth::user();
        $grow = Grow::where('uid','=',$user->uid)->Paginate(5);
        return view('mysy',['grow'=>$grow]);
    }
    //支付
    public function pay(Request $req,$pid){
        //支付方法
        $row = [];
        $row['v_amount'] = $req->tzmonry;
        $row['v_moneytype'] = 'CNY';
        $row['v_oid'] = date('Ymd',time()).mt_rand(1000,9999);
        $row['v_mid'] = '20272562';//这个是商户号
        $row['v_url'] = 'http://d3.com/pro/'.$req->pid;
        $row['key'] = '%()#QOKFDLS:1*&U';
        //将上述的拼接并转大写
        $row['v_md5info'] = strtoupper(md5(implode('',$row)));
        return view('pay',['row'=>$row]);
    }
}
