@extends('admin.layout.app')
@section('admin-content')
<section class="content pt-3">
    <div class="container-fluid">
        <form action="{{route('create-category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                @if (session()->has('success'))
                                <div class="col-md-12 alert alert-success" role="alert">
                                    {{session()->get('success')}}
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            placeholder="Slug">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Create</button>
                <a href="{{route('view-category')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>
@stop