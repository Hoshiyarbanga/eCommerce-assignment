@extends('user.layout.app')
@section('user-content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      @if (session()->has('success'))
      <div class="col-md-12 alert alert-success" role="alert">
        {{session()->get('success')}}
      </div>
      @endif
      <table class="cart">
        <thead>
          <tr>
            <th>Order</th>
            <th>Product</th>
            <th>Product Title</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
            <th>Shiped to</th>
            <th>Created</th>

          </tr>
        </thead>
        <tbody class="table-body">
          @foreach ($orders as $order)
          <tr class="cell-1">
            <td>{{$order->id}}</td>
            <td><img src="assets/images/products/{{$order->product->image}}" class="card" width="50px" height="50px" alt="order_ing">
            </td>
            <td><a href="{{route('view-order-product',['id'=>$order->product->id])}}">{{$order->product->title}}</a>
            </td>
            <td>{{$order->product_quantity}}</td>
            @php
            $price = $order->product_quantity * $order->product->price;
            @endphp
            <td>{{$price}}</td>
            <td><span class="badge badge-success">{{$order->order->status}}</span></td>
            <td>{{$order->order->address->name}}</td>
            <td>{{ date("d-m-y",strtotime($order->created_at))}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@stop