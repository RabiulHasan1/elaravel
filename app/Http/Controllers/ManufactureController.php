<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
class ManufactureController extends Controller
{
    
	public function index(){
		$this->AdminAuthCheck();
		return view('admin.add_manufacture');
	}

	public function save_manufacture(Request $request){
		$this->AdminAuthCheck();
		$data=array();
		$data['manufacture_name']=$request->manufacture_name;
		$data['manufacture_description']=$request->manufacture_description;
		$data['publication_status']=$request->publication_status;

		DB::table('tbl_manufacture')->insert($data);
		Session::put('SuccessMsg','Manufacture Added Successfully');
		return Redirect::to('/all_manufacture');
	}

	public function all_manufacture(){
		$this->AdminAuthCheck();
		$all_manufacture_info = DB::table('tbl_manufacture')->get();
		$manage_manufacture   =   view('admin.all_manufacture')
		                        ->with('all_manufacture',$all_manufacture_info);
		     return   view('admin_layout')
				        ->with('admin.all_manufacture',$manage_manufacture);
	}

	//Active/Deactive manufacture function is here

	public function manufacture_unactive($manufacture_id){
		$this->AdminAuthCheck();
		DB::table('tbl_manufacture')
		->where('manufacture_id',$manufacture_id)
		->update(['publication_status' => 0]);

		Session::put('manufacturemsg','Manufacture Deactive Successfully');
		return Redirect::to('/all_manufacture');

	}

	public function manufacture_active($manufacture_id){
		$this->AdminAuthCheck();
		DB::table('tbl_manufacture')
		->where('manufacture_id',$manufacture_id)
		->update(['publication_status'=>1]);

		Session::put('manufacturemsg','Manufacture Active Successfully');
		return Redirect::to('/all_manufacture');
	}


	//Edit Manufacture Function is here

	public function edit_manufacture($manufacture_id){
		$this->AdminAuthCheck();
		$single_manufacture_info = DB::table('tbl_manufacture')
		                          ->where('manufacture_id',$manufacture_id)
		                           ->first();
		$manage_manufacture=view('admin.edit_manufacture')
							->with('single_manufacture',$single_manufacture_info);
				return view('admin_layout')->with('admin.edit_manufacture',$manage_manufacture);
	}


	public function update_manufacture(Request $request,$manufacture_id){
		$this->AdminAuthCheck();
			$data=array();
		$data['manufacture_name']=$request->manufacture_name;
		$data['manufacture_description']=$request->manufacture_description;
		
		DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update($data);
		Session::put('manufacturemsg','Manufacture Update Successfully');
		return Redirect::to('/all_manufacture');
	}











	//Delete Manufacture function is here

	public function delete_manufacture($manufacture_id){
		$this->AdminAuthCheck();
		DB::table('tbl_manufacture')
		->where('manufacture_id',$manufacture_id)
		->delete();

		Session::put('manufacturemsg','Manufacture Delete Successfully');
		return Redirect::to('/all_manufacture');
	}







	//Admin Auth Check
	public function AdminAuthCheck(){
		$admin_id = Session::get('admin_id');
		if ($admin_id) {
			return;
		}else{
			return Redirect::to('/admin')->send();
		}
	}








}
