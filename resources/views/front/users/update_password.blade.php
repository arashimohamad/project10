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
                            <li class="has-separator"><a href="{{ url('user/account') }}">My Account</a></li>
                            <li class="is-marked"><a href="javascript:;">Update Password</a></li>
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
                                        <li><a href="{{ url('user/account') }}">My Billing / Contact Address</a></li>
                                        <li><a href="orders.html">My Orders</a></li>
                                        <li><a href="wishlist.html">My Wish List</a></li>
                                        <li><a href="javascript:;">Update Password</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Update Password</h1>
                                    <span class="dash__text u-s-m-b-30">Please enter your current password to update your password.</span>
                                    <p style="font-weight: bold; margin-top:10px" id="password-success"><br></p>
                                    <p style="font-weight: bold; margin-top:10px" id="password-error"></p><br>
                                    <form class="dash-address-manipulation" id="passwordForm" action="javascript:;" method="POST">
                                        @csrf
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="current-password">Current Password *</label>
                                                <input class="input-text input-text--primary-style" type="password" id="current-password" name="current_password" placeholder="Current Password">
                                                <p id="password-current_password"></p>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="new-password">New Password *</label>
                                                <input class="input-text input-text--primary-style" type="password" id="new-password" name="new_password" placeholder="New Password">
                                                <p id="password-new_password"></p>
                                            </div>
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="confirm-password">Confirm Password *</label>
                                                <input class="input-text input-text--primary-style" type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password">
                                                <p id="password-confirm_password"></p>
                                            </div>
                                            <div class="u-s-m-b-30"></div>
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