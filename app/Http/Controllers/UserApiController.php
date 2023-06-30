<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiController  extends Controller
{
    public function getAllUSer(){

        $data = User::all();

        if($data){
            return response()->json($data);
        }
        else{
            return response()->json(['message'=>"USer not found"],400);
        }
    }


    public function createUserAPI(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'phone' => "required",
            'name' => "required",
            'email' => "required",
            'password' => "required",
        ]);


        if ($validator->fails()) {
            return response()->json(['message'=>"Thông tin nhập không đúng"],400) ;
        }

        $user = User::create($data);
        if ($user) {
            return response()->json(['message' => "Them thanh cong"], 200);
        } else {
            return response()->json(['message' => "Tồn tại user rồi"], 400);
        }
    }
}
