@extends('user.layout.app')
@section('user-content')
<section class="content mt-2 mb-2">
    <div class="container-fluid">
        <form action="{{ route('stripe.post')}}" method="POST" role="form" action="{{ route('stripe.post') }}"
            method="post" class="require-validation" data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body address">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title">name</label>
                                        <input type="text" name="name" id="title" class="form-control"
                                            placeholder="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" class="form-control"
                                            placeholder="mobile">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">Area</label>
                                        <input type="text" name="area" id="area" class="form-control"
                                            placeholder="Area" autocomplete="address-line1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">city</label>
                                        <input type="text" name="city" id="city" class="form-control"
                                            placeholder="City" autocomplete="address-level2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">State</label>
                                        <input type="text" name="state" id="state" class="form-control"
                                            placeholder="State" autocomplete="address-level1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">landmark</label>
                                        <input type="text" name="landmark" id="country" class="form-control"
                                            placeholder="Landmark">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">Pin code</label>
                                        <input type="number" name="postcode" id="pin-code" class="form-control"
                                            placeholder="Pin Code" autocomplete="postal-code">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="price">Adress Type</label>
                                        <div class="form-control type">
                                            <input type="radio" id="html" name="address_type" value="home">
                                            <label for="html">Home</label>
                                            <input type="radio" id="css" name="address_type" value="office">
                                            <label for="css">Office</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h3>Order Summary</h3>
                                </div>
                                @foreach ($carts as $cart)
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>{{ $cart->product->title }} ({{ $cart->quantity }} item)</p>
                                    </div>
                                    <div class="col-lg-3 offset-lg-3">
                                        <p>{{ $cart->product->price * $cart->quantity }} Rs</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-4 text-right">
                                <p>Total: {{ Session::get('amount') }} Rs</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label for="fname">Accepted Cards</label>
                    <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <div class='form-row row'>
                        <div class='col-lg-12 form-group required'>
                            <label class='control-label'>Name on Card</label> <input class='form-control' size='4'
                                type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-lg-12 form-group required'>
                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                id="credit-card-input" class='form-control card-number' size='20' maxlength=19
                                type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-lg-4 form-group cvc required'>
                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                        </div>
                        <div class='col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                    </div>
                    <div class='form-row row'>
                        <div class='col-md-12 error mt-1 hide'>
                            <div class='alert-danger alert'></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-primary mb-1 btn-md w-100 btn-block" type="submit">Pay Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('js')
<script id="search-js" defer src="https://api.mapbox.com/search-js/v1.0.0-beta.19/web.js"></script>
    <script>
        const script = document.getElementById('search-js');
        script.onload = function() {
            mapboxsearch.autofill({
                accessToken: 'pk.eyJ1IjoiZGl0c3RlayIsImEiOiJjbHFkcmNpeWEwZGN1MmpvN2ZxaTZmaDN2In0.qO9Vxdblj9luFY5xNQlMcw',
                //     options: {
                //     country: 'us'
                // }
            });      
            };
    </script> 
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
      var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
          'input[type=text]', 'input[type=file]',
          'textarea'
        ].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
      $errorMessage.addClass('hide');
      $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
          $errorMessage.removeClass('hide');
          e.preventDefault();
        }
      });
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
    });

    function stripeResponseHandler(status, response) {
      if (response.error) {
        $('.error')
          .removeClass('hide')
          .find('.alert')
          .text(response.error.message);
      } else {
        /* token contains id, last4, and card type */
        var token = response['id'];
        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        $form.get(0).submit();
      }
    }
  });
</script>
@endsection