@extends('layouts.frontend')
@section('search')
    <div class="col-md-3 search-area">
        <form class="navbar-form navbar-left" role="search" action="{{route('product.search')}}" method="get">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control search-top searchdara" placeholder="Search Product" name="search" >
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
    </div>
@endsection
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('front')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <form action="{{route('cart.item.update')}}" method="post">
                                @csrf
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                </tr>
                                </thead><!-- /thead -->
                                <tfoot>

                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                        <span class="">
                            <button type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping
                            cart</button>

                        </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                                $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                                ?>
                                @if($counts > 0)
                                    @foreach($carts as $crt)
                                <tr>
                                    <td class="romove-item">
                                        <a href="{{route('cart.item.remove',$crt->rowId)}}" title="cancel" class="icon"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="{{route('product.details',$crt->id)}}">
                                            <img src="{{asset($crt->options->image)}}" alt="">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class="cart-product-description"><a href="{{route('product.details',$crt->id)}}">{{$crt->name}}</a></h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                        </div><!-- /.row -->
                                        <div class="cart-product-info">
                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <input type="text" value="{{$crt->qty}}" name="qty[]">
                                        </div>
                                        <input type="hidden" name="cart_id[]" value="{{$crt->rowId}}">
                                    </td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price">{{$gn->site_currency}}.{{$crt->subTotal()}}</span></td>
                                </tr>
                                    @endforeach
                                @else
                                @endif
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                            </form>
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">{{$gn->site_currency}}.{{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">{{$gn->site_currency}}.{{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span>
                                    </div>
                                </th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{route('checkout')}}">
                                            <button type="button" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->

        </div><!-- /.container -->
    </div>

@endsection
