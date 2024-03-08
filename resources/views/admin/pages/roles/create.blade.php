@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Role</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form action="{{route('create-role')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    @if (session()->has('Success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('Success')}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Role</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                            </div>
                        </div>

                        <div class="row d-flex">
                            @foreach ($permissions as $permission)
                            <div class="col-lg-3 permission-checkbox">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]"
                                        id="checkPermission{{ $permission->id }}" value="{{$permission->id}}">
                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">
                                        {{$permission->name}}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" type="submit">Create</button>
                <a href="{{route('view-role')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>
@stop