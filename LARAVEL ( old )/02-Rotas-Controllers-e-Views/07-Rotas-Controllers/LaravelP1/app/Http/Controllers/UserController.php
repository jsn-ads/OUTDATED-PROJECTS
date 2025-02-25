<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user');
    }

    public function add($id){
        return view('userAdd');
    }

    public function del($id){
        return view('userDel');
    }
}
