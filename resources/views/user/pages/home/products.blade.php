@extends('user.layout.app')
@section('user-content')

<section>
  <div class="d-flex align-items-center justify-content-around text-align-center category">
    @foreach ($categories as $category)
    <div class="dropdown">
      <div class="">
        <div class="item">
          <a href=""><img src="{{asset('assets/images/category/'.$category->image)}}" alt="item"></a>
          <h5>{{$category->name}}</h5>
        </div>
      </div>
      <div class="dropdown-content">
        @foreach ($category->subcategory as $subcat)
        <a href="{{route('abc',$subcat->id)}}">{{$subcat->name}}</a>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
</section>
@if (!count($products) > 0)
<h1>no products in this category</h1>
@endif

@if (count($products) > 0)
<section>
  <div class="container-fluid main">
    <div class="row d-flex lower">
      @foreach ($products as $product)
      <div class="col-lg-3  product mobiles">
        <a href="{{route('product-description',$product->id)}}">
          <img src="{{ asset('images/' . $product->image) }}" alt="$product->image">
        </a>
        <h3>{{$product->title}}</h3>
        <h6>Now<i class="fas fa-rupee-sign"></i> Rs{{$product->price}}</h6>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@stop