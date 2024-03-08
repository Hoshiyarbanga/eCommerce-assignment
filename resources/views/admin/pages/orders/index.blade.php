@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
            <div class="col-sm-6 text-right">
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
                            <th>Orders Id</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Product Title</th>
                            <th>Date Purchased</th>
                            <th>view</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td><a href="#">{{$order->id}}</a></td>
                            <td>{{$order->address->name}}</td>
                            <td>{{$order->address->mobile}}</td>
                            <td>
                                <button type="button" class="border-0" data-toggle="modal"
                                    data-target="#exampleModalCenter_{{$order->id}}">
                                    <span class="badge bg-success">{{$order->status}}</span>
                                </button>
                                <div class="modal fade" id="exampleModalCenter_{{$order->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('update-status',['id'=>$order->id])}}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <select name="status" id="form">
                                                        <option value="processing">processing</option>
                                                        <option value="deliver">deliver</option>
                                                        <option value="out for delivery">out for delivery</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>tryuy</td>
                            <td>{{ date("d-m-y",strtotime($order->created_at))}}</td>
                            <td><a href="{{route('order-detail',['id'=>$order->id])}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@stop