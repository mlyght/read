<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class user_controller extends Controller
{
    //
	public function index()
	{
		return redirect('user/dashboard');
	}
 
	public function dashboard()
	{
		return view('user.mydashboard');
	}
 
//add user 
	public function addMeter()
	{
		$data = DB::table('client')->get();
		return view('user.addMeter')->with('data', $data);
	}
 
//store new meters
	public function addnewMeter()
	{
		$Meter = new laravel;
		$Meter->meter_number = Input::get("meterNo");
		$Meter->meter_number = Input::get("meter_number");
		$Meter->Meter_customer_id = Input::get("customerId");
		$Meter->name = Input::get("address");
		$Meter->name = Input::get("latitude");
		$Meter->name = Input::get("longitude");
		$Meter->save();
 
		redirect();
	}
	

	public function allReads()
	{
		return view('user.allReads');
	}
 
}
