@extends('user.layout.app')
@section('user-content')

@if (!count($carts) > 0)
<div class="container-fluid  mt-100">
    <div class="row">
        <div class="col-sm-12 empty-cart-cls text-center">
            <h3><strong>Your Cart is Empty</strong></h3>
            <h4>Add something to make me happy :)</h4>
            <a href="{{route('homepage')}}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
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
                <td><img src="{{asset('assets/images/products/'.$cart->product->image) }}" class="thumb"></td>
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                            data-target="#staticBackdrop_{{$cart->id}}">
                            Remove
                        </button>
                        <div class="modal fade" id="staticBackdrop_{{$cart->id}}" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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