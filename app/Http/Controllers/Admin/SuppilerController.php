<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
use App\Models\Admin\Suppiler;

class SuppilerController extends Controller
{
    public function supplier(){

   if(Auth::id()){

   $supplier=Suppiler::get();

   return view('admin.supplier.supplier',compact('supplier'));

   }

   else{

   	return view('auth.login');
   }

    }


  public function addsupplier(Request $request){

  
   $validate=$request->validate([

  'company_name' =>'required',
   'suppiler_name' =>'required|unique:suppilers',
   'phone' =>'required|unique:suppilers',
  'email' =>'required|unique:suppilers',

    ]);

   $addsupplier=new Suppiler();
   $addsupplier->company_name=$request->company_name;
   $addsupplier->suppiler_id=$request->id;
   $addsupplier->suppiler_name=$request->suppiler_name;
   $addsupplier->phone=$request->phone;
   $addsupplier->email=$request->email;

   $addsupplier->save();
    return redirect()->route('admin.suppiler')->with('message','Suupiler Added Successfully');






  }


 public function updatesupplier(Request $request){


  $id=$request->id;
  $updatesupplier=Suppiler::find($id);
  $updatesupplier->company_name=$request->company_name;
   $updatesupplier->suppiler_name=$request->suppiler_name;
   $updatesupplier->phone=$request->phone;
   $updatesupplier->email=$request->email;

   $updatesupplier->save();
    return redirect()->route('admin.suppiler')->with('message','Supplier Update Successfully');




 }


 public function deletesupplier($id){

 $deletesupplier=Suppiler::find($id);
 $deletesupplier->delete();
     return redirect()->route('admin.suppiler')->with('error','Supplier Delete Successfully');




 }





}
