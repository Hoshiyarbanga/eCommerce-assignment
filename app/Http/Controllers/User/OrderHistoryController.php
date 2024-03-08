<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function order()
    {
        $orders = OrderDetail::whereHas('order', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->with('order.address', 'product')->get();
        return view('user.pages.order-history.order')->with(compact('orders'));
    }

    public function detail($id)
    {
        $products = Product::where('id', $id)->first();
        return view('user.pages.order-history.product-detail')->with(compact('products'));
    }
}
