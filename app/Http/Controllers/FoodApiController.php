<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodApiController extends Controller
{
    public function index()
    {
        $foods=Food::all();
        if($foods){
            return response()->json($foods);
        }
        else{
            return response()->json(['message'=>"Food not found"],400);
        }
    }
    public function createFood(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => "required|max:100",
            'image' => "required",
            'description' => "required",
            'price' => "required",
            'discount' => "required",
            'menu_id' => "required",
        ]);


        if ($validator->fails()) {
            return response()->json(['message'=>"Thông tin nhập không đúng"],400) ;
        }

        $food = Food::create($data);
        if ($food) {
            return response()->json(['message' => "Them thanh cong"], 200);
        } else {
            return redirect(route('food.create'))->with(['error' => "Them that bai"], 400);
        }
    }
}
