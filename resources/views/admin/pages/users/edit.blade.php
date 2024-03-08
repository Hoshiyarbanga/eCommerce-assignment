@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update User</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form action="{{route('update-user', ['id' => $user->id])}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" value="{{$user->phone}}" class="form-control"
                                    placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="form">
                                    <option value="active">active</option>
                                    <option value="block">block</option>
                                </select>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            @foreach ($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="role[]" value="{{$role->id}}"
                                    {{$user_role->contains('id', $role->id) ? 'checked' : '' }}>
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
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('view-users')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>
@stop