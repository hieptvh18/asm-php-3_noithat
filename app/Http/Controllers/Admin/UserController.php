<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){

        $user_list = User::paginate(15);

        return view('admin.user.list',compact('user_list'));
    }

    //create
    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        dd($request->all());
    }
}
