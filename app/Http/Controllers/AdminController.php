<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;

class AdminController extends Controller
{
    


public function adminlogout(){



Auth::logout();

    return redirect()->route('fro.home')->with('message','Admin Logout Succesfully');;

}


public function dashboard(){
	if (Auth::id()) {

return view('admin.master');

}
else{

	return view('auth.login');
}


}


}
