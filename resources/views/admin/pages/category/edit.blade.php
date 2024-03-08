@extends('admin.layout.app')
@section('admin-content')
<section class="content pt-3">
    <div class="container-fluid">
        <form action="{{route('update-category',['id'=>$categories->id])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Name</label>
                                        <input type="text" name="name" id="name" value="{{$categories->name}}"
                                            class="form-control" value="" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Slug</label>
                                        <input type="text" name="slug" id="slug" value="{{$categories->slug}}"
                                            class="form-control" placeholder="Slug">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{route('view-category')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
        </form>
    </div>
</section>
@stop