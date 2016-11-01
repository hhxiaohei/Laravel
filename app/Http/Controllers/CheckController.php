<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Att;
use App\Pro;

class CheckController extends Controller{
    public function getList(){
        $pro = Pro::orderBy('pid','desc')->get();
        return view('prolist',['pro'=>$pro]);
    }

    public function getCheck($pid){
        $pro = Pro::find($pid);
        $att = Att::where('pid',$pid)->first();
        return view('shenhe',['pro'=>$pro,'att'=>$att]);
    }

    public function postCheck(Request $req,$pid){
        //$pid = $req->pid;
        $pro = Pro::find($pid);
        $att = Att::where('pid',$pid)->first();
        if(empty($pro)){
            return redirect('list');
        }
        //项目名称
        $pro->title = $req->name;
        //name
        $pro->name = $req->title;
        //借款期限:
        $pro->hrange = $req->hrange;
        //rate
        $pro->rate = $req->rate;
        //udesc
        $att->udesc = $req->udesc;
        //status
        $pro->status = $req->status;
        //gender
        $att->gender = $req->gender;

        if($att->save()&& $pro->save()){
            return 'OK';
        }else{
            return 'false';
        }
    }
}
