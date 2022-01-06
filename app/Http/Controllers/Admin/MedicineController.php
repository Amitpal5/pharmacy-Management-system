<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Medicine;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\stock;


class MedicineController extends Controller
{
    public function medicine(){

    
    return view('admin.Medicine.addmedicine');


    }



 public function addmedicine(Request $request){

 $validate=$request->validate([

 'catagory_name' => 'required',
 'company_name' => 'required',
 'medicine_name' => 'required',
 'medicine_genius' => 'required',
 'strenght' => 'required',
 'buying_price' => 'required',
 'selling_price' => 'required',
 'minimun_stock' => 'required',
  'expire_date' => 'required',

 



 ]);


 $data=array();
 $data['catagory_name']=$request->catagory_name;
 $data['company_name']=$request->company_name;
 $data['medicine_name']=$request->medicine_name;
 $data['medicine_genius']=$request->medicine_genius;
 $data['strenght']=$request->strenght;
 $data['buying_price']=$request->buying_price;
 $data['selling_price']=$request->selling_price;
 $data['minimun_stock']=$request->minimun_stock;
 $data['expire_date']=$request->expire_date;



DB::table('medicines')->insert($data);


$stock=array();
$stock['medicine_name']=$request->medicine_name;
$stock['strenght']=$request->strenght;
$stock['qty']=$request->minimun_stock;
$stock['cost_price']=$request->buying_price;
$stock['sales_price']=$request->selling_price;

DB::table('stocks')->insert($stock);

  return redirect()->route('admin.medicine')->with('message','Medicine Added Successfully');










 }



public function showmedicine(){


$medicine=Medicine::get();
return view('admin.Medicine.showmedicinelist',compact('medicine'));

}


public function updatemedicine(Request $request){

$id=$request->id;
$updatemedicine=Medicine::find($id);
$updatemedicine->catagory_name=$request->catagory_name;
$updatemedicine->company_name=$request->company_name;
$updatemedicine->medicine_name=$request->medicine_name;
$updatemedicine->medicine_genius=$request->medicine_genius;
$updatemedicine->strenght=$request->strenght;
$updatemedicine->buying_price=$request->buying_price;
$updatemedicine->selling_price=$request->selling_price;
$updatemedicine->minimun_stock=$request->minimun_stock;
$updatemedicine->expire_date=$request->expire_date;


$updatemedicine->save();
  return redirect()->route('admin.showmedicine')->with('message','Medicine Update Successfully');




}



public function deletemedicine($id){


$deletemedicine=medicine::find($id);
$deletemedicine->delete();
  return redirect()->route('admin.showmedicine')->with('error','Medicine Delete Successfully');


}

public function stock(){

$stock=DB::table('stocks')->get();
return view('admin.Medicine.addstock',compact('stock'));


}


public function updatestock(Request $request){

$validate=$request->validate([

'nqty' => 'required',




]);
$id=$request->id;
$medi=$request->medicine_name;
$d=$request->nqty;

$updatestock=stock::find($id);
$a=DB::table('stocks')->where('medicine_name',$medi)->value('qty');
$c=$a+$d;
DB::table('stocks')->where('medicine_name',$medi)->update(['qty' =>$c]);



  return redirect()->route('admin.stock')->with('message','Stock Update Successfully');



}






}
