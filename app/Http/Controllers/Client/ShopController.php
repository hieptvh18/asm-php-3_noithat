<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index(){
        return view('client.shop');
    }

    public function detail($id){

        return view('client.product-details');
    }
}
