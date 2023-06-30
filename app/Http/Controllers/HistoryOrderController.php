<?php

namespace App\Http\Controllers;

use App\Models\HistoryOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoryOrderController extends Controller
{
    public function index()
    {
        $historyOrders = HistoryOrder::orderBy('order_id', 'desc')
            ->orderBy('user_phone', 'desc')
            ->get();
        return view('historyOrder.index',compact('historyOrders'));
    }

    public function edit($order_id,$user_phone)
    {
        $historyOrder = HistoryOrder::where('order_id', $order_id)
            ->where('user_phone', $user_phone)
            ->first();
        return view('historyOrder.edit', compact('historyOrder'));
    }


    public function update(Request $request, $order_id,$user_phone)
    {
        $data = $request->except(['_token', '_method']);

        $validator = Validator::make($data, [
            'delivery_address' => "required",
            'status' => "required",
        ]);

        if ($validator->fails()) {
            return redirect(route('historyOrder.edit',['order_id'=>$order_id,'user_phone'=>$user_phone]))->with(['error' => "Du lieu nhap vao khong hop le"], 400);
        }

        $historyOrder = HistoryOrder::where('order_id', $order_id)
            ->where('user_phone', $user_phone)
            ->first();
        if ($historyOrder) {
            $historyOrder->update($data);
            return redirect(route('historyOrder.index'))->with(['success' => "Sua thanh cong"], 200);
        } else {
            return redirect(route('historyOrder.edit',['order_id'=>$order_id,'user_phone'=>$user_phone]))->with(['error' => "Sua that bai"], 400);
        }
    }

    public function delete($order_id,$user_phone)
    {
        try {
            $historyOrder = HistoryOrder::where('order_id', $order_id)
                ->where('user_phone', $user_phone)
                ->first();
            if ($historyOrder) {
                $historyOrder->delete();
                return redirect(route('historyOrder.index'))->with(['success' => "Xoa thanh cong"], 200);
            } else {
                return redirect(route('historyOrder.index'))->with(['error' => "Xoa that bai"], 400);
            }
        } catch (\Exception $e) {
            return redirect(route('historyOrder.index'))->with(['error' => $e->getMessage()], 400);
        }
    }
}
