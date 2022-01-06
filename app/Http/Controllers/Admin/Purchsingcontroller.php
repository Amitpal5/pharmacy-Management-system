<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
use App\Models\Admin\Purchsing;
use Illuminate\Support\Facades\DB;


class Purchsingcontroller extends Controller
{
   
 public function purchsing(){

  $purchsing=Purchsing::get();

  return view('admin.Purchsing.purchsing',compact('purchsing'));


 }


public function getname($company_name){

$name=DB::table('suppilers')->where('company_name',$company_name)->get();
	   return json_encode($name);



}

public function addpurchsing(Request $request){

$validate=$request->validate([



'date' =>'required',
'company_name' =>'required',
'a' =>'required',
'price' =>'required',
'method' =>'required',


]);

$addpurchsing=new Purchsing();
$addpurchsing->date=$request->date;
$addpurchsing->company_name=$request->company_name;
$addpurchsing->supplier_name=$request->a;
$addpurchsing->purching_id=$request->id;
$addpurchsing->purching_price=$request->price;
$addpurchsing->payment_method=$request->method;

$addpurchsing->save();
  return redirect()->route('admin.purchsing')->with('message','Purchsing Added Successfully');





}



public function cashlist(){


$Purchsing=DB::table('purchsings')->where('payment_method',0)->get();
return view('admin.Purchsing.cashlist',compact('Purchsing'));


}


public function duelist(){


$due=DB::table('purchsings')->where('payment_method',1)->get();
return view('admin.Purchsing.duelist',compact('due'));


}



public function paymentmarked($id){


$marked=DB::table('purchsings')->where('id',$id)->update(['payment_method'=>0]);
	return redirect()->route('admin.duelist')->with('message','Payment are marked Succesfully');



}


public function updatepurchsing(Request $request){

$id=$request->id;
$updatepurchsing=Purchsing::find($id);
$updatepurchsing->date=$request->date;
$updatepurchsing->company_name=$request->company_name;
$updatepurchsing->supplier_name=$request->supplier_name;
$updatepurchsing->purching_price=$request->purching_price;
$updatepurchsing->payment_method=$request->method;
$updatepurchsing->save();

  return redirect()->route('admin.purchsing')->with('message','Purchsing Update Successfully');






}





}
