@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Sub Category</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <form action="{{route('create-sub-category')}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if (session()->has('success'))
                        <div class="col-md-12 alert alert-success" role="alert">
                            {{session()->get('success')}}
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Sub Category</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Create</button>
                <a href="{{route('view-sub-category')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
    </form>
</section>
@stop