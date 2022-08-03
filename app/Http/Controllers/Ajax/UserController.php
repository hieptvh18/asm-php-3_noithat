<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // change permission
    public function changePermission(Request $request,$id){
        $user = User::find($id);

        if($user){
            $user->role = 1;
            $user->save();

            return response()->json([
                'message'=>true,
                'data'=>$user->toArray()
            ]);
        }
        return response()->json([
            'message'=>false,
            'data'=>array()
        ]);
    }
}
