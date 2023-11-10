@foreach ($categoryProducts as $product)
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product-m">
            <div class="product-m__thumb">
                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">
                    {{-- Option 1 --}}
                    {{-- Special case on filter size. For id = 4 for size, the system reads the id as product_id in the products_attributes table. 
                    That's why the id is correct, but another picture comes out using id=4 on the products table. Dizziness --}}
                    @if (isset($product['images']['0']['image']) && !empty($product['images']['0']['image']))
                        <img class="aspect__img" src="{{asset('front/images/products/small/'.$product['images']['0']['image'])}}" alt="">                                                            
                    @else
                        <img class="aspect__img" src="{{asset('front/images/product/sitemakers-tshirt.png')}}" alt="">
                    @endif

                    {{-- Option 2
                    @if (isset($product->images['0']->image) && !empty($product->images['0']->image))
                        <img class="aspect__img" src="{{asset('front/images/products/small/'.$product->images['0']->image)}}" alt="">                                                            
                    @else
                        <img class="aspect__img" src="{{asset('front/images/product/sitemakers-tshirt.png')}}" alt="">
                    @endif --}}
                </a>
                <div class="product-m__quick-look">
                    <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a>
                </div>
                <div class="product-m__add-cart">
                    <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">View Details</a>
                </div>
            </div>
            <div class="product-m__content">
                <div class="product-m__category">
                    <a href="shop-side-version-2.html">{{ $product->brand->brand_name }}</a>  {{-- Option 1 --}}
                    {{--<a href="shop-side-version-2.html">{{ $product['brand']['brand_name'] }}</a>  Option 2 --}}
                </div>
                <div class="product-m__name">
                    <a href="product-detail.html">{{ $product->product_name }}</a>
                </div>
                <div class="product-m__rating gl-rating-style">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <span class="product-m__review">(25)</span>
                </div>
                <div class="product-m__price">RM{{ $product->final_price }}
                    @if ($product->discount_type !="")
                        <span class="product-o__discount">
                            RM{{ $product->product_price }}
                        </span>                                                        
                    @endif
                </div>
                <div class="product-m__hover">
                    <div class="product-m__preview-description">
                        <span>{{ $product->description }} </span>
                    </div>
                    <div class="product-m__wishlist">
                        <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endforeach
    <div class="u-s-p-y-60 pagination">
        <?php
            if (!isset($_GET['sort'])) {
                $_GET['sort'] = "";
            }
            
            if (!isset($_GET['color'])) {
                $_GET['color'] = "";
            }   
            
            if (!isset($_GET['size'])) {
                $_GET['size'] = "";
            }  
        ?>        
        <!--====== Pagination ======-->
        {{ $categoryProducts->appends(['sort'=>$_GET['sort'], 'color'=>$_GET['color'], 'size'=>$_GET['size']])->links() }}
        <!--====== End - Pagination ======-->
    </div>

    {{-- <div class="u-s-p-y-60 pagination">        
        <!--====== Pagination ======-->
        @if (isset($request['sort']))
            {{ $categoryProducts->appends(['sort'=>$request['sort']])->links() }}
        @else
            {{ $categoryProducts->links() }}            
        @endif
        <!--====== End - Pagination ======-->
    </div> --}}