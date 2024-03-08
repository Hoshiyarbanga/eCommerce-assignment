<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function index()
  {
    $orders = Order::with(['orderDetails.product', 'address'])
      ->whereHas('orderDetails.product', function ($query) {
        $query->where('user_id', Auth::user()->id);
      })->get();
    return view('admin.pages.orders.index')->with(compact('orders'));
  }

  public function orderDetail($id)
  {
    $orders = OrderDetail::with(['product'])
      ->whereHas('product', function ($query) {
        $query->where('user_id', Auth::user()->id);
      })->whereHas('order', function ($query) use ($id) {
        $query->where('id', $id);
      })->get();
    return view('admin.pages.orders.order-detail')->with(compact('orders'));
  }

  public function update(Request $request, $id)
  {
    $status = Order::where('id', $id)->first();
    $status->update([
      'status' => $request->status,
    ]);
    return redirect()->back()->with('success', 'Status updated successfully');
  }
}
