<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    public function index(){
    	return view('admin_login');
    }

   

    public function admin_dashboard(Request $request){
    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);

    	$result = DB::table('tbl_admin')
		    	->where('admin_email',$admin_email)
		    	->where('admin_password',$admin_password)
		    	->first();

		   if ($result) {
		   	Session::put('admin_name',$result->admin_name);
		   	Session::put('admin_id',$result->admin_id);
		   	return Redirect::to('/dashboard');
		   }else{
		   	Session::put('ErrorMsg','Email or Password Invalid');
		   	return Redirect::to('/admin');
		   }
    }


















}
