@extends('user.layout.app')
@section('user-content')

@if (!count($carts) > 0)
<div class="container-fluid  mt-100">
    <div class="row">
        <div class="col-sm-12 empty-cart-cls text-center">
            <h3><strong>Your Cart is Empty</strong></h3>
            <h4>Add something to make me happy :)</h4>
            <a href="#" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
        </div>
    </div>
</div>
@endif
@if (count($carts) > 0)
<section class="cart-page">
    <table class="cart">
        <thead>
            <tr>
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>yes
                @endif
                <th>Photo</th>
                <th>Qty</th>
                <th>Product</th>
                <th>Line Total</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;
            $id = 0;
            @endphp
            @foreach ($carts as $cart)
            @php
            $price = $cart->quantity * $cart->product->price;
            $id++;
            @endphp
            <tr class="productitm">
                <td><img src="images/{{$cart->product->image}}" class="thumb"></td>
                <td class="d-flex align-items-center justify-content-center mt-2 pb-4">
                    <form action="{{route('decrement', $cart->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary">-</button>
                    </form>
                    <span class="mx-2">{{$cart->quantity}}</span>
                    <form action="{{route('increment', $cart->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary">+</button>
                    </form>
                </td>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}} Rs</td>
                <td>
                    <form method="POST" action="{{ route('delete-cart', ['id' => $cart->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Are you sure, you want to delete this cart item?')"
                            class="btn btn-sm btn-outline-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @php
            $total += $price;
            @endphp
            @endforeach
            <tr class="totalprice">
                <td class="light">Total:</td>
                <td colspan="2">&nbsp;</td>
                {{Session::put('amount', $total)}}
                <td colspan="1"><span class="thick">Rs {{$total}}</span></td>
                <td colspan="1">&nbsp;</td>
            </tr>
            <tr class="checkoutrow">
                <td colspan="5" class="checkout"><a href="{{route('buy-product',[""])}}" id="submitbtn">Checkout Now</a>
                </td>
            </tr>
        </tbody>
    </table>
</section>
@endif
@stop