@extends('admin.layout.app')
@section('admin-content')
<section class="content pt-3">
    <div class="container-fluid">
        <form action="{{route('update-password1',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
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

                                @if (session()->has('failed'))
                                <div class="col-md-12 alert alert-danger" role="alert">
                                    {{session()->get('failed')}}
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Old Password</label>
                                        <input type="password" name="oldPassword" id="oldPassword" class="form-control"
                                            placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">New Password</label>
                                        <input type="password" name="newPassword" id="newPassword" class="form-control"
                                            placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Confirm Password</label>
                                        <input type="passowrd" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Passowrd">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Save changes</button>
                <a href="{{route('view-dashboard')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
 <script type="text/javascript">

 </script>
@endsection