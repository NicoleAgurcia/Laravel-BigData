<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;


class ReportController extends Controller{


//GET SUM OF SMS SENT FOR AN USER
/*	public function getUser(){
		$uid = 77;
		$from =$request->input('from');
		$to   = $request->input('to');
		
		$a = DB::table('playsms_tblSMSOutgoing_historic')
			->select(DB::raw('count(*) as user_count, username, playsms_tblUser.uid'))
			->join('playsms_tblUser', 'playsms_tblSMSOutgoing_historic.uid', '=', 'playsms_tblUser.uid')
			->where('playsms_tblUser.uid','=', $uid)
			->whereBetween('playsms_tblSMSOutgoing_historic.p_datetime', array($from, $to))
			->groupBy('username','uid');


		$users = DB::table('playsms_tblSMSOutgoing')
			->select(DB::raw('count(*) as user_count, username, playsms_tblUser.uid'))
			->join('playsms_tblUser', 'playsms_tblSMSOutgoing.uid', '=', 'playsms_tblUser.uid')
			->where('playsms_tblUser.uid','=',$uid)
			->whereBetween('playsms_tblSMSOutgoing.p_datetime', array($from, $to))
			->groupBy('username', 'uid')
			->union($a)
			->get();
		return view('users', ['users'=> $users]);
	}
*/
public function getUser(Request $request){
		$uid = 77;
	/*	$from =$request->input('from');
		$to   = $request->input('to');*/
		$from = '2009-01-01';
		$to   = '2017-01-01';
		$d = DB::table('playsms_tblSMSOutgoing_historic')
				->select(DB::raw('p_msg, p_dst, p_datetime'))
			->where('uid','=', $uid)
			->whereBetween('p_datetime', array($from, $to))
			->orderby('uid');


		$users = DB::table('playsms_tblSMSOutgoing')
			->select(DB::raw('p_msg, p_dst, p_datetime'))
			->where('uid','=', $uid)
			->whereBetween('p_datetime', array($from, $to))
			->orderby('uid')
			//->union($d)
			
			->get();

		
		return view('users', compact('users'));
	}

//GET SUM OF SMS SENT FOR EACH SUB USER

	public function getCount(Request $request){
		$uid  = 25;
		$from =$request->input('from');
		$to   = $request->input('to');

$request->session()->put('from', $from);
$request->session()->put('to', $to);

		$a = DB::table('playsms_tblSMSOutgoing_historic')
			->select(DB::raw('count(*) as user_count, username, t.uid as user_id'))
			->join(DB::raw("(SELECT user.uid, user.username FROM  playsms_tblUser user,  playsms_tblUser a WHERE a.uid = user.parent_uid AND a.uid='".$uid."') t")
							,function($join){
								$join->on('playsms_tblSMSOutgoing_historic.uid', '=', 't.uid');
					  	})
			->whereBetween('playsms_tblSMSOutgoing_historic.p_datetime', array($from, $to))
			->groupBy('t.username','t.uid');

		$users = DB::table('playsms_tblSMSOutgoing')
			->select(DB::raw('count(*) as user_count, username, t.uid as user_id'))

			->join(DB::raw("(SELECT user.uid, user.username FROM  playsms_tblUser user,  playsms_tblUser a WHERE a.uid = user.parent_uid AND a.uid='".$uid."') t")
							,function($join){
            		$join->on('playsms_tblSMSOutgoing.uid', '=', 't.uid');
        			})
			->whereBetween('playsms_tblSMSOutgoing.p_datetime', array($from, $to))
			->groupBy('t.username','t.uid')
			->union($a)
			->get();

		return view('index', ['users'=> $users]);
	}
}
