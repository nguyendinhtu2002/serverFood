<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users=User::orderBy('phone','desc')->get();
        return view('user.index',compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'phone' => "required|max:10",
            'name' => "required",
            'email' => "required",
            'password' => "required",
        ]);


        if ($validator->fails()) {
            return redirect(route('user.create'))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $user = User::create($data);
        if ($user) {
            return redirect(route('user.index'))->with(['success' => "Them thanh cong"], 200);
        } else {
            return redirect(route('user.create'))->with(['error' => "Them that bai"], 400);
        }
    }

    public function edit($phone)
    {
        $user = User::where('phone', $phone)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $phone)
    {
        $data = $request->except(['_token', '_method']);

        $validator = Validator::make($data, [
            'name' => "required",
            'email' => "required",
            'password' => "required",
        ]);

        if ($validator->fails()) {
            return redirect(route('user.edit',['phone'=>$phone]))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $user = User::where('phone', $phone);
        if ($user) {
            $user->update($data);
            return redirect(route('user.index'))->with(['success' => "Sua thanh cong"], 200);
        } else {
            return redirect(route('user.edit',['phone'=>$phone]))->with(['error' => "Sua that bai"], 400);
        }
    }

    public function delete($phone)
    {
        try {
            $user = User::where('phone', $phone)->first();
            if ($user) {
                $user->delete();
                return redirect(route('user.index'))->with(['success' => "Xoa thanh cong"], 200);
            } else {
                return redirect(route('user.index'))->withErrors(['error' => "Xoa that bai"], 400);
            }
        } catch (\Exception $e) {
            return redirect(route('user.index'))->with(['error' => $e->getMessage()], 400);
        }
    }

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
            'phone' => "required|max:10",
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
