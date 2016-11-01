<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Grow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //这里写涨利息的方法
        $today = date('Y-m-d');
        $task = DB::table('tasks')->where('enddate','>=',$today)->get();
        $row = [];
        foreach($task as $v){
            $row['uid'] = $v->uid;
            $row['pid'] = $v->pid;
            $row['title'] = $v->title;
            $row['amount'] = $v->amount;
            $row['paytime'] = $today;
            DB::table('grows')->insert($row);
        }
    }
}
