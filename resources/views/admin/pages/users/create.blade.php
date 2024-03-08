@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create User</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <form action="{{route('create-user')}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if (session()->has('Success'))
                        <div class="col-md-12 alert alert-success" role="alert">
                            {{session()->get('Success')}}
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="checkbox-container">
                            @foreach ($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="role[]" id="role{{$role->id}}"
                                    value="{{$role->id}}">
                                <label class="form-check-label" for="role{{$role->id}}">
                                    {{$role->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{route('view-users')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
    </form>
</section>
@stop