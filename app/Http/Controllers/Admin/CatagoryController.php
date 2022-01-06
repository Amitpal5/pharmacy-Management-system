<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
use App\Models\Admin\Catagory;

class CatagoryController extends Controller
{
    public function catagory(){

    	if(Auth::id()){

         $catagory=Catagory::get();
    		return view('admin.catagory.catagory',compact('catagory'));

    	}
    	else{

         return view('auth.login');

    	}

    

    }

 public function addcatagory(Request $request){

 $validate=$request->validate([
 
 'name' => 'required|unique:catagories',


 ]);	


 $addcatagory=new Catagory();
 $addcatagory->catagory_id=$request->id;
 $addcatagory->name=$request->name;
 $addcatagory->save();
     return redirect()->route('admin.catagory')->with('message','Catagory Added Successfully');





 }


public function updatecatagory(Request $request){


$id=$request->id;
$updatecatagory=Catagory::find($id);
$updatecatagory->name=$request->name;
$updatecatagory->save();

     return redirect()->route('admin.catagory')->with('message','Catagory Update Successfully');


}


public function deletecatagory($id){


$deletecatagory=Catagory::find($id);
$deletecatagory->delete();
     return redirect()->route('admin.catagory')->with('error','Catagory Delete Successfully');



}


}
