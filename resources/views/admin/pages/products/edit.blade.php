@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form action="{{route('update-product', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" value="{{$product->title}}" name="title" id="title"
                                            class="form-control" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <input type="text" value="{{$product->description}}" name="description"
                                            id="description" cols="30" rows="10" class="form-control"
                                            placeholder="Description">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" value="{{$product->price}}" name="price" id="price"
                                            class="form-control" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">Image</label>
                                        <input type="file" name="image" id="image" class="for-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">quantity</label>
                                        <input type="number" value="{{$product->quantity}}" min="1" name="quantity"
                                            id="qty" class="form-control" placeholder="Qty">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4  mb-3">Product category</h2>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        @foreach ($sub_cat as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button class="btn btn-primary">Create</button>
                    <a href="{{route('view-products')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
        </form>
    </div>
    <!-- /.card -->
</section>
@stop