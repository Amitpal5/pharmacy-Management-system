<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;

class salescontroller extends Controller
{
    public function sales(){

   return view('admin.sales.addsales');

    }

 public function fetch(Request $request){

 if($request->get('a'))
 {
 	$a=$request->get('a');

 	$data=DB::table('medicines')->where('medicine_name' ,'LIKE','%'.$a.'%')->get();
 	
 	$output ='<ul class="dropdown-menu" style="display:block; position:relative">';
 	foreach($data as $row){
     $output .='<li class="item"><a href="javascript:void(0)" data-id="'.$row->id.'" class="addcart">'.$row->medicine_name.'<input type="hidden" name="id" class="id" value="'.$row->id.'"><input type="hidden" name="name" class="name" value="'.$row->medicine_name.'"><input type="hidden" name="qty" class="qty" value="1"><input type="hidden" name="name" class="price" value="'.$row->selling_price.'"></a></li>';

 	}
 	$output .='</ul>';
 	return \Response::json($output);
 }

 }

Public function addcart($id){
	   
	   $product=DB::table('medicines')->where('id',$id)->first();
	   
	   
	   $data =array();
	   
	   $data['id'] =$product->id;
	   $data['name'] =$product->medicine_name;
	   $data['qty'] =1;
	   $data['price'] =$product->selling_price;
	   $data['weight'] =1;
	   
	   
	   
	   Cart::add($data);
	   
	   $items=Cart::content();
	   $amount=Cart::subtotal();
	   
	   return \Response::json(['status'=>true,'item'=>$items,'amounts'=>$amount,'msg' => 'Successfully added to cart']);
	   
   
  
   
}
   



}
