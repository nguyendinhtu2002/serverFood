<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        return view('order.index',compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);

        $validator = Validator::make($data, [
            'quantity' => "required",
            'discount' => "required",
        ]);

        if ($validator->fails()) {
            return redirect(route('order.edit',['id'=>$id]))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $order = Order::where('id', $id);
        if ($order) {
            $order->update($data);
            return redirect(route('order.index'))->with(['success' => "Sua thanh cong"], 200);
        } else {
            return redirect(route('order.edit',['id'=>$id]))->with(['error' => "Sua that bai"], 400);
        }
    }

    public function delete($id)
    {
        try {
            $order = Order::where('id', $id)->first();
            if ($order) {
                $order->delete();
                return redirect(route('order.index'))->with(['success' => "Xoa thanh cong"], 200);
            } else {
                return redirect(route('order.index'))->with(['error' => "Xoa that bai"], 400);
            }
        } catch (\Exception $e) {
            return redirect(route('order.index'))->with(['error' => $e->getMessage()], 400);
        }
    }
}
