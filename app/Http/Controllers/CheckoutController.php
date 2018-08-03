<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
session_start();
use Illuminate\Support\Facades\Redirect;
class CheckoutController extends Controller
{
  public function login_check(){
  	return view('pages.login');
  }


  public function customer_registation(Request $request){
  	$data = array();
  	$data['customer_name']=$request->customer_name;
  	$data['customer_email']=$request->customer_email;
  	$data['customer_password']=md5($request->customer_password);
  	$data['customer_phone']=$request->customer_phone;

  	$customer_id = DB::table('tbl_customer')
  				->insertGetId($data);

  		Session::put('customer_id',$customer_id);
  		Session::put('customer_name',$request->customer_name);

  		return Redirect('/checkout');
  }


  public function checkout(){
  		return view('pages.checkout');

  }

  public function save_shipping_details(Request $request){
    $data = array();
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_first_name']=$request->shipping_first_name;
    $data['shipping_last_name']=$request->shipping_last_name;
    $data['shipping_address']=$request->shipping_address;
    $data['shipping_mobile_number']=$request->shipping_mobile_number;
    $data['shipping_city']=$request->shipping_city;

    $shipping_id = DB::table('tbl_shipping')
                  ->insertGetId($data);
              Session::put('shipping_id',$shipping_id);
              return Redirect::to('/payment');

  }

  public function customer_logout(){
    Session::flush();
    return Redirect('/');
  }

  public function customer_login(Request $request){
      $customer_email = $request->customer_email;
      $customer_password=md5($request->customer_password);

      $result = DB::table('tbl_customer')
                ->where('customer_email',$customer_email)
                ->where('customer_password',$customer_password)
                ->first();


        if ($result) {
          $customer_id = Session::put('customer_id',$request->customer_id);
         return Redirect::to('/checkout');
        }else{
          return Redirect::to('/login_check');
        }

  }

  public function payment(){
    return view('pages.payment'); 
  }

  public function order_place(Request $request){
    $payment_method = $request->payment_method;
    $pdata=array();
    $pdata['payment_method']=$payment_method;
    $pdata['payment_status']='pending';

   $payment_id =  DB::table('tbl_payment')
                ->insertGetId($pdata);


      $odata = array();
      $odata['customer_id']=Session::get('customer_id');
      $odata['shipping_id']=Session::get('shipping_id');
      $odata['payment_id']=$payment_id;
      $odata['order_total']=Cart::total();
      $odata['ordar_status']='pending';

      $order_id =  DB::table('tbl_order')
                ->insertGetId($odata);


        $contents = Cart::content();

        $order_details_data=array();
        foreach ($contents as $v_content) {
          $order_details_data['order_id']=$order_id;
          $order_details_data['product_id']=$v_content->id;
          $order_details_data['product_name']=$v_content->name;
          $order_details_data['product_price']=$v_content->price;
          $order_details_data['product_sales_quantity']=$v_content->qty;


          Db::table('tbl_order_details')->insert($order_details_data);
        }
        if ($payment_method == 'handcash') {
         Cart::destroy();
         return view('pages.handcash');
        }
        elseif($payment_method == 'cart'){
          echo "Succesfully done by cart";
        }
        elseif($payment_method == 'paypal'){
          echo "Succesfully done by paypal";
        }


                
               
  }













}
