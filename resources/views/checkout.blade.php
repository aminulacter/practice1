@extends('layouts.layout')
@section('breadcrumb')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Checkout</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Checkout</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
@endsection
@section('content')
<section class="dashboard-area">
<div class="dashboard_contents">
    <div class="container">
        <form method="post" id="paypal-payment-form" action="{{ route('checkout.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="information_module">
                        <div class="toggle_title">
                            <h4>Biling Information </h4>
                        </div>

                        <div class="information__set">
                            <div class="information_wrapper form--fields">
                                <div class="form-group">
                                    <label for="email">Name Or Company Name
                                        <sup>*</sup>
                                    </label>
                                    <input type="text" id="name" class="text_field" placeholder="Name" value="{{ auth()->user()->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="email1">Email Adress
                                        <sup>*</sup>
                                    </label>
                                    <input type="text" id="email1" class="text_field" placeholder="Email address" value="{{ auth()->user()->email }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="country1">Country
                                        <sup>*</sup>
                                    </label>

                                    <div class="select-wrap select-wrap2">
                                        <select name="country" id="country1" class="text_field">
                                            <option value="">Select one</option>
                                            @foreach (Countries::getList('en', 'php') as $country)
                                            <option value="{{ $country }}">{{ $country }}</option> 
                                            @endforeach
                                       
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="address1">Address Line 1</label>
                                    <input type="text" id="address1" name="address1" class="text_field" placeholder="Address line one">
                                </div>

                                <div class="form-group">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" id="address2" name='address2' class="text_field" placeholder="Address line two">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City / State
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="city" name="city" class="text_field" placeholder="City">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zipcode">Zip / Postal Code
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="zipcode" name="zipcode" class="text_field" placeholder="zip/postal code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /.information__set -->
                    </div>
                    <!-- end /.information_module -->
                </div>
                <!-- end /.col-md-6 -->

                <div class="col-lg-6">
                    <div class="information_module order_summary">
                        <div class="toggle_title">
                            <h4>Order Summary</h4>
                        </div>

                        <ul>
                            @foreach (Cart::content() as $item)
                            <li class="item">
                                <a href="{{ route('products.show', $item->id) }}" target="_blank">{{ $item->name }}</a>
                                <span>${{ $item->price }}</span>
                            </li>
                            @endforeach
                            
                            <li>
                                <p>Estimated Taxes & Fees:</p>
                                <span>${{Cart::tax()}}</span>
                            </li>
                            <li class="total_ammount">
                                <p>Total</p>
                                <span>${{ Cart::total() }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.information_module-->

                    <div class="information_module payment_options">
                        <div class="toggle_title">
                            <h4>Payment Methods</h4>
                        </div>

                        {{-- <ul>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="opt1" class="" name="filter_opt">
                                    <label for="opt1">
                                        <span class="circle"></span>Credit Card</label>
                                </div>
                                <img src="images/cards.png" alt="Visa Cards">
                            </li>

                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="opt2" class="" name="filter_opt">
                                    <label for="opt2">
                                        <span class="circle"></span>Paypal</label>
                                </div>
                                <img src="images/paypal.png" alt="Visa Cards">
                            </li>

                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="opt3" class="" name="filter_opt">
                                    <label for="opt3">
                                        <span class="circle"></span>Martplace Credit</label>
                                </div>
                                <p>Balance
                                    <span class="bold">$180</span>
                                </p>
                            </li>
                        </ul> --}}

                        <div class="payment_info modules__content">
                           
                               
                                <section>
                                    {{-- <form method="post" id="paypal-payment-form" action="{{ route('checkout.store') }}">
                                        @csrf --}}
                                        <div class="bt-drop-in-wrapper">
                                        <div id="bt-dropin"></div>
                                    </div>
                                   
                                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                                    <button class="btn btn--round btn--default" type="submit">Confirm Order</button>
                                </form>
                                </section>                                                     
                        </div>
                    </div>
                    <!-- end /.information_module-->
                </div>
                <!-- end /.col-md-6 -->
            </div>
            <!-- end /.row -->
        
        <!-- end /form -->
    </div>
</form>
    <!-- end /.container -->
</div>
<!-- end /.dashboard_menu_area -->
</section>
@endsection
@section('extrajs')
<script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
<script>
  (function(){
    let form = document.querySelector('#paypal-payment-form');
   
    let client_token = "{{ $paypalToken }}";

    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      }
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();

        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }

          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
  })();
  
</script>
@endsection
