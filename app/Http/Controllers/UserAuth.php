<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    function userLogin(Request $request){
       $data= $request->input();
       $request->session()->put('user',$data['user']);
       return redirect('profile');
    }
}
