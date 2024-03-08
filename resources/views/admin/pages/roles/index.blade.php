@extends('admin.layout.app')
@section('admin-content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Roles</h1>
            </div>
            @can('create-role')
            <div class="col-sm-6 text-right">
                <a href="{{route('add-role')}}" class="btn btn-primary">Create Role</a>
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
                            <th>Role</th>
                            <th>Slug</th>
                            <th>Permissions</th>
                            <th width="100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->slug}}</td>
                            <td>
                                @foreach ($role->permissions as $index => $permission)
                                <span class="badge badge-info mr-1">
                                    {{ $permission->name }}
                                </span>
                                @if(($index + 1)%7 === 0)
                                <br>
                                @endif
                                @endforeach
                            </td>
                            <td class="d-flex">
                                @can('update-role')
                                <a href="{{route('edit-role',$role->slug)}}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                @endcan
                                @can('delete-role')
                                <form method="POST" action="{{ route('delete-role', ['id' => $role->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this role?')"
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