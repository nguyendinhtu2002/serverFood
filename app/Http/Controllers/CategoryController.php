<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys=Category::orderBy('id','desc')->get();
        return view('category.index',compact('categorys'));
    }
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => "required|max:100",
            'image' => "required",
        ]);


        if ($validator->fails()) {
            return redirect(route('category.create'))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $category = Category::create($data);
        if ($category) {
            return redirect(route('category.index'))->with(['success' => "Them thanh cong"], 200);
        } else {
            return redirect(route('category.create'))->with(['error' => "Them that bai"], 400);
        }
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);

        $validator = Validator::make($data, [
            'name' => "required|max:100",
            'image' => "required",
        ]);

        if ($validator->fails()) {
            return redirect(route('category.edit',['id'=>$id]))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $category = Category::where('id', $id);
        if ($category) {
            $category->update($data);
            return redirect(route('category.index'))->with(['success' => "Sua thanh cong"], 200);
        } else {
            return redirect(route('category.edit',['id'=>$id]))->with(['error' => "Sua that bai"], 400);
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::where('id', $id)->first();
            if ($category) {
                $category->delete();
                return redirect(route('category.index'))->with(['success' => "Xoa thanh cong"], 200);
            } else {
                return redirect(route('category.index'))->with(['error' => "Xoa that bai"], 400);
            }
        } catch (\Exception $e) {
            return redirect(route('category.index'))->with(['error' => $e->getMessage()], 400);
        }
    }
}
