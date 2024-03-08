@extends('user.layout.app')
@section('user-content')

<div class="container-fluid main-a mt-4">
    <div class="row description">

        @if (session()->has('cart'))
        <div class="col-md-12 alert alert-success" role="alert">
            {{session()->get('cart')}}
        </div>
        @endif

        <div class="col-lg-5 col-md-5">
            <div class="product-img">
                <img id="thumbnail" src="{{ asset('images/' . $products->image) }}" alt="Product Image"
                    class="img-fluid">
            </div>
        </div>
        <div class="col-lg-7 product-description-side">
            <div class="section-heading">
                <h2 class="product-title">{{$products->title}}</h2>
                <h6 class="product-price">Rs {{$products->price}}</h6>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
            <div class="section-body">
                <p class="product-description">{{$products->description}}</p>
                @csrf
                <div class="input-group mb-3 quantity-controls">
                    <input type="number" name="quantity" class="" min="1" max="10" value="1">
                </div>
            </div>
        </div>
    </div>
</div>

@stop