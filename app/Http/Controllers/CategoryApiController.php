<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryApiController  extends Controller
{
    public function index()
    {
        $categorys=Category::all();
        if($categorys){
            return response()->json($categorys);
        }
        else{
            return response()->json(['message'=>"Category not found"],400);
        }
    }
    public function createCategory(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => "required|max:100",
            'image' => "required",
        ]);


        if ($validator->fails()) {
            return response()->json(['message'=>"Thông tin nhập không đúng"],400) ;
        }

        $category = Category::create($data);
        if ($category) {
            return response()->json(['message' => "Them thanh cong"], 200);
        } else {
            return response()->json(['message' => "Tồn tại Category rồi"], 400);
        }
    }

}
