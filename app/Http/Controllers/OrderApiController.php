<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderApiController extends Controller
{
    public function index()
    {
        $orders=Order::all();
        if($orders){
            return response()->json($orders);
        }
        else{
            return response()->json(['message'=>"Food not found"],400);
        }
    }
    public function createOrders(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_phone' => "required|max:100",
            'food_id' => "required",
            'food_name' => "required",
            'quantity' => "required",
            'discount' => "required"
        ]);


        if ($validator->fails()) {
            return response()->json(['message'=>"Thông tin nhập không đúng"],400) ;
        }

        $order = Order::create($data);
        if ($order) {
            return response()->json(['message' => "Them thanh cong"], 200);
        } else {
            return response()->json(['message' => "Thêm thất bại"], 400);
        }
    }
}
