<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update status of payment_transaction table';

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
     * @return int
     */
    public function handle()
    {
    //    DB::table('smartvcard.custom_settings')->delete();
    //    status
       $mytime = date("Y-m-d");
       $result = DB::table('smartvcard.payment_transactions')->where('smartvcard.payment_transactions.plan_expire_date', '<=', $mytime)->update(['smartvcard.payment_transactions.status' => 0]);
	   echo 'Done';
    }


}
