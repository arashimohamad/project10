@extends('front.layout.layout')
@section('content')
<!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-10">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator"><a href="{{ url('/') }}">Home</a></li>
                                <li class="is-marked"><a href="javascript:;">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        {{-- <div class="u-s-p-b-60">            
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="checkout-msg-group">
                                <div class="msg u-s-m-b-30">

                                    <span class="msg__text">Returning customer?

                                        <a class="gl-link" href="#return-customer" data-toggle="collapse">Click here to login</a></span>
                                    <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                        <div class="l-f u-s-m-b-16">

                                            <span class="gl-text u-s-m-b-16">If you have an account with us, please log in.</span>
                                            <form class="l-f__form">
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-15">

                                                        <label class="gl-label" for="login-email">E-MAIL *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail"></div>
                                                    <div class="u-s-m-b-15">

                                                        <label class="gl-label" for="login-password">PASSWORD *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="login-password" placeholder="Enter Password"></div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-15">

                                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button></div>
                                                    <div class="u-s-m-b-15">

                                                        <a class="gl-link" href="lost-password.html">Lost Your Password?</a></div>
                                                </div>

                                                <!--====== Check Box ======-->
                                                <div class="check-box">

                                                    <input type="checkbox" id="remember-me">
                                                    <div class="check-box__state check-box__state--primary">

                                                        <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                                </div>
                                                <!--====== End - Check Box ======-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="msg">

                                    <span class="msg__text">Have a coupon?

                                        <a class="gl-link" href="#have-coupon" data-toggle="collapse">Click Here to enter your code</a></span>
                                    <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                        <div class="c-f u-s-m-b-16">

                                            <span class="gl-text u-s-m-b-16">Enter your coupon code if you have one.</span>
                                            <form class="c-f__form">
                                                <div class="u-s-m-b-16">
                                                    <div class="u-s-m-b-15">

                                                        <label for="coupon"></label>

                                                        <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Coupon Code"></div>
                                                    <div class="u-s-m-b-15">

                                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">APPLY</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div> --}}
        <!--====== End - Section 2 ======-->


        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="checkout-f">
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="deliveryAddresses">
                                    @include('front.products.delivery_addresses')
                                </div>
                                <h1 class="checkout-f__h1 deliveryText">ADD NEW DELIVERY ADDRESS</h1>
                                <form class="checkout-f__delivery" id="deliveryAddressForm" method="post" action="javascript:;"> 
                                    @csrf
                                    <input type="hidden" id="delivery_id" name="delivery_id" value="">
                                    <div class="u-s-m-b-30">

                                        <!--====== NAME ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="delivery_name">NAME *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_name" name="delivery_name">
                                            <p id="delivery-delivery_name"></p>
                                        </div>
                                        <!--====== End - NAME ======-->

                                        <!--====== ADDRESS ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="delivery_address">ADDRESS *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_address" name="delivery_address">
                                            <p id="delivery-delivery_address"></p>
                                        </div>
                                        <!--====== End - ADDRESS ======-->

                                        <!--====== CITY ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="delivery_city">CITY *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_city" name="delivery_city">
                                            <p id="delivery-delivery_city"></p>
                                        </div>
                                        <!--====== End - CITY ======-->

                                        <!--====== STATE ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="delivery_state">STATE *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_state" name="delivery_state">
                                            <p id="delivery-delivery_state"></p>
                                        </div>
                                        <!--====== End - STATE ======-->

                                        <!--====== Country ======-->
                                        <div class="u-s-m-b-15">
                                            <!--====== Select Box ======-->
                                            <label class="gl-label" for="delivery_country">COUNTRY *</label>
                                            <select class="select-box select-box--primary-style" id="delivery_country" name="delivery_country">
                                                <option selected value="">Choose Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country['country_name']}}" @if ($country['country_name'] == Auth::user()->country) selected @endif>
                                                        {{$country['country_name']}}
                                                    </option>                                                    
                                                @endforeach
                                                
                                            </select>
                                            <p id="delivery-delivery_country"></p>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <!--====== End - Country ======-->

                                        <!--====== PINCODE ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="deleivery_postcode">POSTCODE *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_postcode" name="delivery_postcode">
                                            <p id="delivery-delivery_postcode"></p>
                                        </div>
                                        <!--====== End - PINCODE ======-->

                                        <!--====== MOBILE ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="delivery_mobile">MOBILE *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_mobile" name="delivery_mobile">
                                            <p id="delivery-delivery_mobile"></p>
                                        </div>
                                        <!--====== End - MOBILE ======-->                                       
                                        
                                        <div>
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit" id="deliveryForm">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                                <!--====== Order Summary ======-->
                                <div class="o-summary">
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__item-wrap gl-scroll">
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">

                                                        <img class="u-img-fluid" src="images/product/sitemakers-tshirt.png" alt=""></div>
                                                    <div class="o-card__info-wrap">

                                                        <span class="o-card__name">

                                                            <a href="product-detail.html">Product Name</a></span>

                                                        <span class="o-card__quantity">Quantity x 1</span>

                                                        <span class="o-card__price">₹900</span></div>
                                                </div>

                                                <a class="o-card__del far fa-trash-alt"></a>
                                            </div>
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">

                                                        <img class="u-img-fluid" src="images/product/sitemakers-tshirt.png" alt=""></div>
                                                    <div class="o-card__info-wrap">

                                                        <span class="o-card__name">

                                                            <a href="product-detail.html">Product Name</a></span>

                                                        <span class="o-card__quantity">Quantity x 1</span>

                                                        <span class="o-card__price">₹900</span></div>
                                                </div>

                                                <a class="o-card__del far fa-trash-alt"></a>
                                            </div>
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">

                                                        <img class="u-img-fluid" src="images/product/sitemakers-tshirt.png" alt=""></div>
                                                    <div class="o-card__info-wrap">

                                                        <span class="o-card__name">

                                                            <a href="product-detail.html">Product Name</a></span>

                                                        <span class="o-card__quantity">Quantity x 1</span>

                                                        <span class="o-card__price">₹900</span></div>
                                                </div>

                                                <a class="o-card__del far fa-trash-alt"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">BILLING ADDRESS</h1>
                                            <div class="ship-b">

                                                <span class="ship-b__text">Bill to:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p">Amit Gupta, 5678 CP New Delhi, Delhi, India (+91) 9700000000</p>

                                                    <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <table class="o-summary__table">
                                                <tbody>
                                                    <tr>
                                                        <td>SUBTOTAL</td>
                                                        <td>₹2700</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SHIPPING (+)</td>
                                                        <td>₹0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TAX (+)</td>
                                                        <td>₹0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DISCOUNT (-)</td>
                                                        <td>₹0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GRAND TOTAL</td>
                                                        <td>₹2700</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">PAYMENT METHODS</h1>
                                            <form class="checkout-f__payment">
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="cash-on-delivery" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="direct-bank-transfer" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="direct-bank-transfer">Direct Bank Transfer</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-with-check" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-with-check">Pay With Check</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                                </div>
                                                
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-pal" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-pal">PayPal (Pay With Credit / Debit Card / Paypal Credit)</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to make Payment with your Credit / Debit Card or Paypal Credit.</span>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <!--====== Check Box ======-->
                                                    <div class="check-box">

                                                        <input type="checkbox" id="term-and-condition">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="term-and-condition">I consent to the</label></div>
                                                    </div>
                                                    <!--====== End - Check Box ======-->

                                                    <a class="gl-link">Terms of Service.</a>
                                                </div>
                                                <div>

                                                    <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Order Summary ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
    </div>
<!--====== End - App Content ======-->
@endsection