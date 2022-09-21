<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\PaymentTransaction;
use App\Models\ScanDetail;
use App\Models\SmartCard;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JeroenDesloovere\VCard\VCard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
    
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->id;

        $plan = PaymentTransaction::select('id', 'plan_name', 'plan_id')
                ->where('user_id',$user)
                ->orderBy('id', 'desc')
                ->first();
                
        $scan = ScanDetail::where('user_id', $user)->get();
        $total_scan = $scan->count();

        $scans = ScanDetail::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $months = ScanDetail::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach($months as $index => $month)
        {
            $datas[$month] = $scans[$index];
        }
        

        return view('home', compact('plan', 'total_scan','datas'));
    }
    
    function getSelectData($status)
    {
        // return response()->json('hi');
        if($status == 1){
            $scans = ScanDetail::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
    
            $months = ScanDetail::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
            $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    
            foreach($months as $index => $month)
            {
                $datas[$month] = $scans[$index];
            }

            return response()->json($datas);
        }
    }

    function getAllMonths(){

		$month_array = array();
		$vcards_dates = SmartCard::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$vcards_dates = json_decode( $vcards_dates );

		if ( ! empty( $vcards_dates ) ) {
			foreach ( $vcards_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
	}

	function getMonthlyPostCount( $month ) {
		$monthly_post_count = SmartCard::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_post_count;
	}

	function getMonthlyPostData() {

        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

		$monthly_post_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_post_count = $this->getMonthlyPostCount( $month_no );
				array_push( $monthly_post_count_array, $monthly_post_count );
				array_push( $month_name_array, $month_name );
			}
		}

		$monthly_post_data_array = array(
			'months' => $month_name_array,
			'post_count_data' => $monthly_post_count_array,
			
		);

		return response()->json($monthly_post_data_array);

    }
    

    public function handleAdmin()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $totalUser=SmartCard::count();
        $recentUsers=SmartCard::join('users as ur','vcards.user_id','ur.id')
                                ->select(
                                    'vcards.*',
                                    'ur.username', 
                                    'ur.email', 
                                )
                               ->orderBy('created_at', 'DESC')->limit(5)->get();
        $Users=User::orderBy('created_at', 'DESC')->limit(5)->get();
        $totalActiveUse=PaymentTransaction::where('status',1)->count();

        $countUser = User::where('status',1)->count();

        // return $activeUser;
        // $countUser = $activeUser->count();

        // return $countUser;


        
        return view('admin.home',compact('totalUser','totalActiveUse','Users','recentUsers', 'countUser'));
    } 

    public function allPosts()
    {
        return view('all-blogs');
    }

    /**
     * 
     * User Scan Count
     */

    public function getScanCount(){

        $user=Auth::user();

        $scan_count=ScanDetail::where('user_id',$user->id)->get()->count();
        dd($scan_count);
    }
    
}
