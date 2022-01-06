<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    public function user(){

    
    return view('admin.user.adduser');

    }


public function adduser(Request $request){

$request->validate([

'name' =>'required|unique:users',
'email' =>'required|unique:users',
'password' =>'required',
'type' =>'required',


]);

$data=array();
$data['name']=$request->name;
$data['email']=$request->email;
$data['password']=Hash::make($request->password);
$data['ppassword']=$request->password;
$data['utype']=$request->type;

DB::table('users')->insert($data);
return redirect()->route('admin.user')->with('message','User Added Successfully');

}


public function showuser(){

$user=DB::table('users')->where('utype',0)->get();
return view('admin.user.showuser',compact('user'));

}



}
