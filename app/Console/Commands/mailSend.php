<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class mailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email Send to that user, who will be expired next week';

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
        $mytime = date("Y-m-d");
        $results = DB::table('smartvcard.payment_transactions')->where('smartvcard.payment_transactions.reminder_date', '<=', $mytime)->get();
        foreach($results as $result)
        {
            $expireData = [
                'product' => $result->plan_name,
                'expire_date' => $result->plan_expire_date
            ];
            // echo $result->email;
            // $user = [
            //     'email' => $result->email
            //     ];
            //     $status = Mail::send('expiredEmail.send', ['user'=>$user], function($msg) use ($user){
            //         $msg->from('absiddikanik11@gmail.com','SmartVcard');
            //     $msg->to($user['email'])->subject('Your Plan Expired Remider');
            // });
            \Mail::to($result->email)->send(new \App\Mail\ExpiredUser($expireData));
        }
    }
}
