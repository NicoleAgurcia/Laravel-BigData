<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;
use App\Data;
use App\History;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class DataController extends Controller
{
	public function getSms(Request $request ){
		$uid =  $request->get('id');;

		$from = $request->session()->get('from');
		$to   = $request->session()->get('to');


	/*	echo "SOY LA FECHA".$from;*/

		$a = History::where('uid','=', $uid)
			->whereBetween('playsms_tblSMSOutgoing_historic.p_datetime', array($from, $to));


		/*$users = Data::where('uid','=', $uid)
			->whereBetween('playsms_tblSMSOutgoing.p_datetime', array($from, $to))
			->chunk(200, function ($users) {
			  echo "Hola";
				return view('datauser', ['users'=> $users]);
			 
			});*/

		$a= Data::all();

		$users = Data::where('uid','=', $uid)
		->whereBetween('playsms_tblSMSOutgoing.p_datetime', array($from, $to))
		->get();
//$users->chunk(100);
		$searchResults = $users;




 		$currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($searchResults);

        //Define how many items we want to be visible in each page
        $perPage = 100;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        return view('datauser', ['results' => $paginatedSearchResults]);

	}

}
