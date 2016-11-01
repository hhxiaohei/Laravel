<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GrowController extends Controller
{
    public function run(){
//        $today = date('Y-m-d');
//        $task = DB::table('tasks')->where('enddate','>=',$today)->get();
//        $row = [];
//        foreach($task as $v){
//            $row['uid'] = $v->uid;
//            $row['pid'] = $v->pid;
//            $row['title'] = $v->title;
//            $row['amount'] = $v->amount;
//            $row['paytime'] = $today;
//            DB::table('grows')->insert($row);
//        }
        return redirect('/');
    }
}
