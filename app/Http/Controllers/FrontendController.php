<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    

 public function index(){

  return view('auth.login');

 }



public function redirect(){
		
		$user=Auth::user()->utype;
		if($user=='1'){
					

			return view('admin.master');
		}
		
		else{
			

						return view('student.master');
			
		}
		
	}






}
