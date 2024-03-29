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
                            <li class="is-marked"><a href="javascript:;">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                <div class="dash__pad-1">
                                    <span class="dash__text u-s-m-b-16">Hello, {{ Auth::user()->name }}</span>
                                    <ul class="dash__f-list">
                                        <li><a href="javascript:;">My Billing / Contact Address</a></li>
                                        <li><a href="orders.html">My Orders</a></li>
                                        <li><a href="wishlist.html">My Wish List</a></li>
                                        <li><a href="{{ url('user/update-password') }}">Update Password</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">My Billing / Contact Address</h1>
                                    <span class="dash__text u-s-m-b-30">Please add your Billing / Contact details.</span>
                                    <p style="font-weight: bold; margin-top:10px" id="account-success"><br></p>
                                    <p style="font-weight: bold; margin-top:10px" id="account-error"></p><br>
                                    <form class="dash-address-manipulation" id="accountForm" action="javascript:;" method="POST">
                                        @csrf
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="billing-email">EMAIL *</label>
                                                <input style="background-color:#ccc" class="input-text input-text--primary-style" type="text" id="billing-email" name="email" placeholder="EMAIL" value="{{ Auth::user()->email }}" readonly>
                                                <p id="account-email"></p>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="billing-name">NAME *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="billing-name" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                                                <p id="account-name"></p>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="billing-address">ADDRESS *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="billing-address" name="address" placeholder="ADDRESS" value="{{ Auth::user()->address }}">
                                                <p id="account-address"></p>
                                            </div>
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="billing-city">CITY *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="billing-city" name="city" placeholder="CITY" value="{{ Auth::user()->city }}">
                                                <p id="account-city"></p>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="billing-state">STATE *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="billing-state" name="state" placeholder="STATE" value="{{ Auth::user()->state }}">
                                                <p id="account-state"></p>
                                            </div>
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <!--====== Select Box ======-->
                                                <label class="gl-label" for="billing-country">COUNTRY *</label>
                                                <select class="select-box select-box--primary-style" id="billing-country" name="country" required>
                                                    <option selected value="">Choose Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->country_name }}" @if ($country->country_name == Auth::user()->country) selected @endif>{{ $country->country_name }}</option>                                                        
                                                    @endforeach                                                    
                                                </select>
                                                <!--====== End - Select Box ======-->
                                                <p id="account-country"></p>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="billing-postcode">POSTCODE *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="billing-postcode" name="postcode" placeholder="POSTCODE" value="{{ Auth::user()->postcode }}">
                                                <p id="account-postcode"></p>
                                            </div>
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="billing-mobile">MOBILE *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="billing-mobile" name="mobile" placeholder="MOBILE" value="{{ Auth::user()->mobile }}">
                                                <p id="account-mobile"></p>
                                            </div>                                            
                                        </div>
                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->
@endsection