@extends('admin.layout.app')
@section('admin-content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('seller-orders')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$order->product->id}}</th>
                            <th><img src="{{ asset('images/' . $order->product->image) }}" width="50px" height="50px">
                            </th>
                            <td>{{$order->product->title}}</td>
                            <td>{{$order->product_quantity}}</td>
                            <td>{{$order->product->price}}</td>
                            <td>{{$order->product_quantity * $order->product->price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@stop