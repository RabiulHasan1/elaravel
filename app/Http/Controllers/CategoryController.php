<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    
	public function index(){
		$this->AdminAuthCheck();
		return view('admin.add_category');
	}

	public function save_category(Request $request){
		$this->AdminAuthCheck();
		$data=array();
		$data['category_name']=$request->category_name;
		$data['category_description']=$request->category_description;
		$data['publication_status']=$request->publication_status;
        
        DB::table('tbl_category')->insert($data);
        Session::put('SuccessMsg','Category Added Successfully');
		return Redirect::to('/add_category');
		
		                  
	}
	
	public function all_category(){
		$this->AdminAuthCheck();
		$all_category_info = DB::table('tbl_category')->get();
		$manage_category =view('admin.all_category')
		                 ->with('all_category_info',$all_category_info);
		return view('admin_layout')->with('admin.all_category',$manage_category);
	}

	



	//Category Active/Unactive

	public function active($category_id){
		$this->AdminAuthCheck();
		DB::table('tbl_category')
		->where('category_id',$category_id)
		->update(['publication_status' => 1]);

		Session::put('catmsg','Category active Successfully');
		return Redirect::to('/all_category');
	}

	public function unactive($category_id){
		$this->AdminAuthCheck();
		DB::table('tbl_category')
		->where('category_id',$category_id)
		->update(['publication_status' => 0]);

		Session::put('catmsg','Category Deactive Successfully');
		return Redirect::to('/all_category');
	}



	//Category Edit/Update Function is here

	public function edit_category($category_id){
		$this->AdminAuthCheck();
		$all_category_info = DB::table('tbl_category')
							->where('category_id',$category_id)
							->first();
			$manage_category= view('admin.edit_category')
							  ->with('all_category_info',$all_category_info);
		return view('admin_layout')->with('admin.edit_category',$manage_category);
	}

	public function update_category(Request $request,$category_id){
		$this->AdminAuthCheck();
		$data=array();
		$data['category_name']=$request->category_name;
		$data['category_description']=$request->category_description;

		DB::table('tbl_category')
		->where('category_id',$category_id)
		->update($data);
		Session::put('catupdate','Category Update Successfully');
		return Redirect::to('/all_category');
	}	


	//Category Delete function is here

	public function delete_category($category_id){
		$this->AdminAuthCheck();
		DB::table('tbl_category')
		->where('category_id',$category_id)
		->delete();
		Session::put('catdelete','Category Delete Successfully');
		return Redirect::to('/all_category');
	}


	public function AdminAuthCheck(){
		$admin_id = Session::get('admin_id');
		if ($admin_id) {
			return;
		}else{
			return Redirect::to('/admin')->send();
		}
	}






}
