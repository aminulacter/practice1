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
                            <a href="#">Shopping Cart</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Shopping Cart</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
@endsection
@section('content')
<section class="cart_area section--padding2 bgcolor">
    <div>
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
       
    </div>
    <div class="container">
       @if(Cart::count() > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="product_archive added_to__cart">
                    <div class="title_area">
                        <div class="row">
                            <div class="col-md-5">
                                <h4>Product Details</h4>
                            </div>
                            <div class="col-md-3">
                                <h4 class="add_info">Category</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        @foreach (Cart::content() as $item)
                        <div class="col-md-12">
                            <div class="single_product clearfix">
                                <div class="col-lg-5 col-md-7 v_middle1">
                                    <div class="product__description">
                                        <img src="{{ asset($item->model->image) }}" alt="Purchase image">
                                        <div class="short_desc">
                                            <a href="{{ route('products.show', $item->model->id) }}">
                                                <h4>{{ $item->model->name }}</h4>
                                            </a>
                                            <p>{{ $item->model->description }}</p>
                                        </div>
                                    </div>
                                    <!-- end /.product__description -->
                                </div>
                                <!-- end /.col-md-5 -->

                                <div class="col-lg-3 col-md-2 v_middle1">
                                    <div class="product__additional_info">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                {{ $item->options->has('licencetype') ? licenseType($item->options->licencetype) : ''}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end /.product__additional_info -->
                                </div>
                                <!-- end /.col-md-3 -->

                                <div class="col-lg-4 col-md-3 v_middle1">
                                    <div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>{{ $item->price }}</span>
                                        </div>
                                        <div class="item_action v_middle">
                                            @php
                                                $id ="row". $item->rowId;
                                            @endphp
                                            <a href="{{ route('cart.destroy', $item->rowId)}}" class="remove_from_cart" onclick="event.preventDefault();
                                            document.getElementById('{{ $id }}').submit();"> 
                                                <span class="lnr lnr-trash"></span>
                                            </a>
                                        <form action="{{ route('cart.destroy', $item->rowId)}}" method="POST" id="{{$id}}">
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                                    <!-- end /.product__price_download -->
                                </div>
                                <!-- end /.col-md-4 -->
                            </div>
                            <!-- end /.single_product -->
                        </div>   
                        @endforeach
                       
                    </div>
                    <!-- end /.row -->

                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="cart_calculation">
                                <div class="cart--subtotal">
                                    <p>
                                        <span>Cart Subtotal</span>{{Cart::subtotal()}}</p>
                                </div>
                                <div class="cart--subtotal">
                                    <p>
                                        <span>Tax</span>{{Cart::tax()}}</p>
                                </div>
                                <div class="cart--total">
                                    <p>
                                        <span>total</span>{{ Cart::total() }}</p>
                                </div>

                                <a href="{{ route('checkout.index') }}" class="btn btn--round btn--md checkout_link">Proceed To Checkout</a>
                            </div>
                        </div>
                        <!-- end .col-md-12 -->
                    </div>
                    <!-- end .row -->
                </div>
                <!-- end /.product_archive2 -->
            </div>
            <!-- end .col-md-12 -->
        </div>
        <!-- end .row -->
      @else
        <h3> No Item in the Cart</h3>
        <a href="checkout.html" class="btn btn--round btn--md checkout_link" style="margin-top: 10px">Continue Shopping</a>
     @endif
    </div>
    <!-- end .container -->
</section>
@endsection