<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;

class ChekoutController extends Controller
{
    public function purchase()
    {
        $carts = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        return view('user.pages.home.checkout')->with(compact('carts'));
    }

    public function stripePost(Request $request)
    {
        try {
            DB::beginTransaction();
            $abc =  $request->validate([
                'name' => 'required',
                'mobile' => 'required',
                'postcode' => 'required',
                'area_address_search' => 'required',
                'state' => 'required',
                'landmark' => 'required',
            ]);          
            $address = Address::create([
                'name' => $request->name, 'mobile' => $request->mobile,
                'pin_code' => $request->postcode, 'area' =>$request->area_address_search, 'city' => $request->city,
                'state' => $request->state, 'landmark' => $request->landmark, 'address-type' => $request->address_type,
                'user_id' => Auth::user()->id,
            ]);
            $order = Order::create([
                'address_id' => $address->id, 'user_id' => Auth::user()->id, 'status' => 'processing',
            ]);
            $carts = Cart::where('user_id', Auth::user()->id)->with('product')->get();
            foreach ($carts as $cart) {
                OrderDetail::create([
                    'product_id' => $cart->product_id,
                    'order_id' => $order->id,
                    'product_quantity' => $cart->quantity,
                ]);
                $product = Product::find($cart->product_id);
                if ($product->quantity < $cart->quantity) {
                    DB::rollBack();
                    return redirect()->back();
                }
                $product->quantity -= $cart->quantity;
                $product->save();
            }
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
                "amount" => Session::get('amount'),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from tutsmake.com."
            ]);
            foreach ($carts as $cart) {
                DB::table('carts')->where('user_id', Auth::user()->id)->delete();
            }
            DB::commit();
            return redirect()->route('view-order')->with('success', 'Payment success and Your Order is in processing');
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
