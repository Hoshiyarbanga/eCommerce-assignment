<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->with('product')->get();
        return view('user.pages.cart.index')->with(compact('carts'));
    }
    public function store(Request $request)
    {
        Cart::create(['product_id' => $request->product_id, 'user_id' => Auth::user()->id, 'quantity' => $request->quantity]);
        return redirect()->back()->with('cart', 'Add to cart successfully');
    }

    public function increment(Request $request, $id)
    {
        $user = Cart::where('id', $id)->first();
        if ($user->quantity < 10) {
            $abc = $user->quantity + 1;
            $user->update([
                'quantity' => $abc,
            ]);
            return redirect()->back()->with('success', 'Cart Updated Successfully');
        }
        return redirect()->back();
    }

    public function decrement(Request $request, $id)
    {
        $user = Cart::where('id', $id)->first();
        if ($user->quantity > 1) {
            $abc = $user->quantity - 1;
            $user->update([
                'quantity' => $abc,
            ]);
            return redirect()->back()->with('success', 'Cart Updated Successfully');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('carts')->where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Cart item deleted successfully');
    }
}
