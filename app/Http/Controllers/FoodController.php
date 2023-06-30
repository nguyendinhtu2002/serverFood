<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function index()
    {
        $foods=Food::orderBy('id','desc')->get();
        return view('food.index',compact('foods'));
    }
    public function create()
    {
        return view('food.create');
    }

    public function store(Request $request)
    {
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
            return redirect(route('food.create'))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $food = Food::create($data);
        if ($food) {
            return redirect(route('food.index'))->with(['success' => "Them thanh cong"], 200);
        } else {
            return redirect(route('food.create'))->with(['error' => "Them that bai"], 400);
        }
    }

    public function edit($id)
    {
        $food = Food::where('id', $id)->first();
        return view('food.edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);

        $validator = Validator::make($data, [
            'name' => "required|max:100",
            'image' => "required",
            'description' => "required",
            'price' => "required",
            'discount' => "required",
            'menu_id' => "required",
        ]);

        if ($validator->fails()) {
            return redirect(route('food.edit',['id'=>$id]))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $food = Food::where('id', $id);
        if ($food) {
            $food->update($data);
            return redirect(route('food.index'))->with(['success' => "Sua thanh cong"], 200);
        } else {
            return redirect(route('food.edit',['id'=>$id]))->with(['error' => "Sua that bai"], 400);
        }
    }

    public function delete($id)
    {
        try {
            $food = Food::where('id', $id)->first();
            if ($food) {
                $food->delete();
                return redirect(route('food.index'))->with(['success' => "Xoa thanh cong"], 200);
            } else {
                return redirect(route('food.index'))->with(['error' => "Xoa that bai"], 400);
            }
        } catch (\Exception $e) {
            return redirect(route('food.index'))->with(['error' => $e->getMessage()], 400);
        }
    }
}
