@extends('user.layout.app')
@section('user-content')
{{-- category section --}}
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

<Section class="mt-2 mb-2">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('user/images/banner2.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('user/images/banner3.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('user/images/banner2.jpg')}}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</Section>
<section>
  <div class="main">
    <div class="upper">
      <div class="heading-left">
        <h1>Best Battery Phones</h1>
        <h2>More than 4000mAh</h2>
      </div>
      <div class="heading-right">
        <button>View All</button>
      </div>
    </div>
    <div class="d-flex lower">
      @foreach ($products as $product)
      <div class="product mobiles">
        <a href="{{route('product-description',$product->id)}}">
          <img src="{{asset('assets/images/products/'.$product->image)}}" alt="mobile">
        </a>
        <h3>{{$product->title}}</h3>
        <h6>Now<i class="fas fa-rupee-sign"></i>{{$product->price}}</h6>
      </div>
      @endforeach
    </div>
  </div>
</section>
@stop