@extends('front.layout.layout')
@section('content')
<div align="center"><div class="print-error-msg" style="width: 90%"></div></div>
<!--====== App Content ======-->
<div class="app-content" id="appendCartItems">
    @include('front.products.cart_items')
</div>
<!--====== End - App Content ======-->
@endsection