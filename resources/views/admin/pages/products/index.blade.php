@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            @can('create-product')
            <div class="col-sm-6 text-right">
                <a href="{{route('add-product')}}" class="btn btn-primary">New Product</a>
            </div>
            @endcan
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                @if (session()->has('update'))
                <div class="col-md-12 alert alert-success" role="alert">
                    {{session()->get('update')}}
                </div>
                @endif
                @if (session()->has('delete'))
                <div class="col-md-12 alert alert-success" role="alert">
                    {{session()->get('delete')}}
                </div>
                @endif
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th width="80">image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>SKU</th>
                            <th width="100">Status</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $id = 0;
                        @endphp
                        @foreach ($products as $product)
                        @php
                        $id++;
                        @endphp
                        <tr>
                            <td>{{$id}}</td>
                            <td><img src="assets/images/products/{{$product->image}}" class="img-thumbnail" width="50"></td>
                            <td><a href="#">{{$product->title}}</a></td>
                            <td>Rs {{$product->price}}</td>
                            <td>{{$product->quantity}} left in Stock</td>
                            <td>UGG-BB-PUR-06</td>
                            <td>
                                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </td>
                            <td class="d-flex">
                                @can('update-product')
                                <a href="{{route('edit-product',$product->id)}}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                @endcan
                                @can('delete-product')
                                <form method="POST" action="{{ route('delete-product', ['id' => $product->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                        class="text-danger w-4 h-4 mr-1" style="border: none">
                                        <svg wire:loading.remove.delay="" wire:target=""
                                            class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path ath fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                                @endcan
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