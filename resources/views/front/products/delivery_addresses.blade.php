@if (count($deliveryAddresses) > 0)
    <h1 class="checkout-f__h1">DELIVERY ADDRESSES</h1>
    <div class="o-summary__section u-s-m-b-30">
        <div class="o-summary__box">
            <div class="ship-b">
                <span class="ship-b__text">Ship to:</span>
                @foreach ($deliveryAddresses as $adr)
                    <div class="ship-b__box u-s-m-b-10">
                        <input type="radio" id="address{{ $adr['id'] }}" name="address_id" value="{{ $adr['id'] }}">
                        <p class="ship-b__p">
                            {{ $adr['name'] }}<br> 
                            {{ $adr['address'] }},
                            {{ $adr['postcode'] }} 
                            {{ $adr['city'] }},  
                            {{ $adr['state'] }}, 
                            {{ $adr['country'] }} <br>Mobile: {{ $adr['mobile'] }}
                        </p>
                        <a href="javascript:;" class="ship-b__edit btn--e-transparent-platinum-b-2 editAddress" 
                        data-modal="modal" data-modal-id="#edit-ship-address" data-addressid="{{ $adr['id'] }}">Edit</a>
                        <a href="javascript:;" class="ship-b__edit btn--e-transparent-platinum-b-2 deleteAddress" 
                        data-modal="modal" data-modal-id="#delete-ship-address" data-addressid="{{ $adr['id'] }}">Delete</a>
                    </div>                                                    
                @endforeach                                                
            </div>
        </div>
    </div>                                   
@endif