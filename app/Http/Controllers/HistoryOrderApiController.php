<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\HistoryOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoryOrderApiController extends Controller
{
    public function index()
    {
        $historyorders=HistoryOrder::all();
        if($historyorders){
            return response()->json($historyorders);
        }
        else{
            return response()->json(['message'=>"Food not found"],400);
        }
    }
    public function getByPhone($phone){
        $historyorders=HistoryOrder::where("user_phone",$phone)->get();
        if($historyorders){
            return response()->json($historyorders);
        }
        else{
            return response()->json(['message'=>"Food not found"],400);
        }
    }
    public function createHistory(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_phone' => "required",
            'delivery_address' => "required",
            'price' => "required",
            'status' => "required"
        ]);


        if ($validator->fails()) {
            return response()->json(['message'=>"Thông tin nhập không đúng"],400) ;
        }

        $historu = HistoryOrder::create($data);
        if ($historu) {
            return response()->json(['message' => "Them thanh cong"], 200);
        } else {
            return response()->json(['message' => "Thêm thất bại"], 400);
        }
    }
}
