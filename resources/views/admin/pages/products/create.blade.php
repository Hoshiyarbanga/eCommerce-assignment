@extends('admin.layout.app')
@section('admin-content')
<section class="content pt-3">
    <div class="container-fluid">
        <form action="{{route('create-product')}}" method="post" enctype="multipart/form-data">
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
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" id="description" cols="30" rows="10"
                                            class="form-control" placeholder="Description">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Price">
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
                                        <input type="number" min="1" name="quantity" id="qty" class="form-control"
                                            placeholder="Qty">
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
                                        <option value="" selected>Select</option>
                                     @if ($categories)
                                     @foreach ($categories as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                     @endforeach
                                     @endif
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="subCategory" class="form-control">
                                        <option selected>Select</option>
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
</section>
@endsection
@section('js')
<script type="text/javascript">
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
   });
   $(document).ready(function(){
        $("#category").change(function(){
            var category_id = $(this).val();

            if (category_id == "") {
                var category_id = 0;
            } 

            $.ajax({
                url: '{{ url("/fetch-states/") }}/'+category_id,
                type: 'post',
                dataType: 'json',
                success: function(response) {                    
                    $('#subCategory').find('option:not(:first)').remove();
                      if (response['states'].length > 0) {
                        $.each(response['states'], function(key,value){
                            $("#subCategory").append("<option value='"+value['id']+"'>"+value['name']+"</option>")
                        });
                    } 
                }
            });            
        });   
    });        
       
</script>
@endsection