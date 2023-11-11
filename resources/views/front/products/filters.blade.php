@php
    use App\Models\ProductsFilter;
@endphp
<div class="shop-w-master">
    <h1 class="shop-w-master__heading u-s-m-b-30">
        <i class="fas fa-filter u-s-m-r-8"></i>
        <span>FILTERS</span>
    </h1>
    <div class="shop-w-master__sidebar">
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">CATEGORY</h1>
                    <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-category">
                    <ul class="shop-w__category-list gl-scroll">
                        <li class="has-list">
                            <a href="#">Clothing</a>
                            <span class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                            <ul style="display:block">
                                <li class="has-list">
                                    <a href="#">Men</a>
                                    <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                    <ul>
                                        <li>
                                            <a href="#">T-Shirts</a>
                                        </li>
                                        <li>
                                            <a href="#">Shirts</a>
                                        </li>
                                        <li>
                                            <a href="#">Jeans</a>
                                        </li>
                                        <li>
                                            <a href="#">Shorts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-list">
                                    <a href="#">Women</a>
                                    <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                    <ul>
                                        <li>
                                            <a href="#">Tops</a></li>
                                        <li>
                                            <a href="#">Dresses</a></li>
                                        <li>
                                            <a href="#">Shorts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-list">
                                    <a href="#">Kids</a>
                                    <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                    <ul>
                                        <li>
                                            <a href="#">T-Shirts</a>
                                        </li>
                                        <li>
                                            <a href="#">Shirts</a>
                                        </li>
                                        <li>
                                            <a href="#">Shorts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-list">
                                    <a href="#">Dummy</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-list">
                            <a href="#">Electronics</a>
                            <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                            <ul>
                                <li class="has-list">
                                    <a href="#">Mobiles</a>
                                    <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                    <ul>
                                        <li>
                                            <a href="#">Smartphones</a>
                                        </li>
                                        <li>
                                            <a href="#">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-list">
                                    <a href="#">Laptops</a>
                                    <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                    <ul>
                                        <li>
                                            <a href="#">Laptops</a>
                                        </li>
                                        <li>
                                            <a href="#">Tablets</a>
                                        </li>
                                        <li>
                                            <a href="#">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-list">
                            <a href="#">Appliances</a>
                            <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                            <ul>
                                <li class="has-list">
                                    <a href="#">Air Conditioners</a>
                                </li>
                                <li class="has-list">
                                    <a href="#">Refrigerators</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">RATING</h1>
                    <span class="fas fa-minus shop-w__toggle" data-target="#s-rating" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-rating">
                    <ul class="shop-w__list gl-scroll">
                        <li>
                            <div class="rating__check">
                                <input type="checkbox">
                                <div class="rating__check-star-wrap">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <span class="shop-w__total-text">(2)</span>
                        </li>
                        <li>
                            <div class="rating__check">
                                <input type="checkbox">
                                <div class="rating__check-star-wrap">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </div>
                            </div>
                            <span class="shop-w__total-text">(8)</span>
                        </li>
                        <li>
                            <div class="rating__check">
                                <input type="checkbox">
                                <div class="rating__check-star-wrap">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </div>
                            </div>
                            <span class="shop-w__total-text">(10)</span>
                        </li>
                        <li>
                            <div class="rating__check">
                                <input type="checkbox">
                                <div class="rating__check-star-wrap">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </div>
                            </div>
                            <span class="shop-w__total-text">(12)</span>
                        </li>
                        <li>
                            <div class="rating__check">
                                <input type="checkbox">
                                <div class="rating__check-star-wrap">
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>& Up</span>
                                </div>
                            </div>
                            <span class="shop-w__total-text">(1)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">SIZE</h1>
                    <span class="fas fa-minus shop-w__toggle" data-target="#s-size" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-size">
                    @php $getSizes = ProductsFilter::getSizes($categoryDetails['catIds']); @endphp
                    <ul class="shop-w__list gl-scroll">
                        @foreach ($getSizes as $key => $size)
                            <?php
                                // Highlight size selector
                                if (isset($_GET['size']) && !empty($_GET['size'])) {                            
                                    $colors = explode('~', $_GET['size']);  
                                    if (!empty($sizes) && in_array($size, $sizes)) {
                                        $sizeChecked = "checked";
                                    } else {
                                        $sizeChecked = "";
                                    }
                                } else {
                                    $sizeChecked = "";
                                }
                            ?>
                            <li>
                                <!--====== Check Box ======-->
                                <div class="check-box">
                                    <input type="checkbox" id="size{{$key}}" name="size" value="{{$size}}" class="filterAjax" {{ $sizeChecked }}>
                                    <div class="check-box__state check-box__state--primary">                                        
                                        <label class="check-box__label" for="size{{$key}}">{{$size}}</label>
                                    </div>
                                </div>
                                <!--====== End - Check Box ======-->
                            </li>                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">BRAND</h1>
                    <span class="fas fa-minus shop-w__toggle" data-target="#s-brand" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-brand">
                    @php $getBrands = ProductsFilter::getBrands($categoryDetails['catIds']); @endphp
                    <ul class="shop-w__list gl-scroll">
                        @foreach ($getBrands as $key => $brand)
                            <?php
                                // Highlight brand selector
                                if (isset($_GET['brand']) && !empty($_GET['brand'])) {  
                                    //echo $brand['id']; die;                          
                                    $brands = explode('~', $_GET['brand']);  
                                    if (!empty($brands) && in_array($brand['id'], $brands)) {
                                        $brandChecked = "checked";
                                    } else {
                                        $brandChecked = "";
                                    }
                                } else {
                                    $brandChecked = "";
                                }
                            ?>
                            <li>
                                <!--====== Check Box ======-->
                                <div class="check-box">
                                    <input type="checkbox" id="brand{{$key}}" name="brand" value="{{$brand['id']}}" class="filterAjax" {{ $brandChecked }}>
                                    <div class="check-box__state check-box__state--primary">
                                        <label class="check-box__label" for="brand{{$key}}">{{ $brand['brand_name'] }}</label>
                                    </div>
                                </div>
                                <!--====== End - Check Box ======-->
                            </li>
                        @endforeach                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">PRICE</h1>
                    <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-price">
                    @php $getPrices = ['1-100', '101-200', '201-300', '301-400', '401-500']; @endphp
                    <ul class="shop-w__list gl-scroll">
                        @foreach ($getPrices as $key => $price)
                            <?php
                                // Highlight price selector
                                if (isset($_GET['price']) && !empty($_GET['price'])) {                                                               
                                    $prices = explode('~', $_GET['price']);  
                                    if (!empty($prices) && in_array($price, $prices)) {
                                        $priceChecked = "checked";
                                    } else {
                                        $priceChecked = "";
                                    }
                                } else {
                                    $priceChecked = "";
                                }
                            ?>
                            <li>
                                <!--====== Check Box ======-->
                                <div class="check-box">
                                    <input type="checkbox" id="price{{$key}}" name="price" value="{{$price}}" class="filterAjax" {{ $priceChecked  }}>
                                    <div class="check-box__state check-box__state--primary">                                        
                                        <label class="check-box__label" for="price{{$key}}">{{$price}}</label>
                                    </div>
                                </div>
                                <!--====== End - Check Box ======-->
                            </li>                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">COLOR</h1>
                    <span class="fas fa-minus shop-w__toggle" data-target="#s-color" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-color">
                    @php                         
                        $getColors = ProductsFilter::getColors($categoryDetails['catIds']);             
                        // call function getColors() is gained from App\Models\ProductsFilter
                    @endphp
                    <ul class="shop-w__list gl-scroll">
                        @foreach ($getColors as $key => $color)
                            <?php
                                // Highlight color selector
                                if (isset($_GET['color']) && !empty($_GET['color'])) {                            
                                    $colors = explode('~', $_GET['color']);  
                                    if (!empty($colors) && in_array($color, $colors)) {
                                        $colorChecked = "checked";
                                    } else {
                                        $colorChecked = "";
                                    }
                                } else {
                                    $colorChecked = "";
                                }
                            ?>
                            <li>
                                <div class="color__check">
                                    <input type="checkbox" id="color{{$key}}" name="color" value="{{$color}}" class="filterAjax" {{ $colorChecked }}>
                                    <label class="color__check-label" for="color{{$key}}" style="background-color: {{$color}}" title="{{$color}}"></label>
                                </div>{{$color}}                                
                            </li>                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @php $getDynamicFilters = ProductsFilter::getDynamicFilters($categoryDetails['catIds']); @endphp
        @foreach ($getDynamicFilters as $key => $filter)
            <div class="u-s-m-b-30">
                <div class="shop-w shop-w--style">
                    <div class="shop-w__intro-wrap">
                        <h1 class="shop-w__h">{{ ucwords($filter) }}</h1>
                        <span class="fas fa-minus collapsed shop-w__toggle" data-target="#s-filter{{$key}}" data-toggle="collapse"></span>
                    </div>
                    <div class="shop-w__wrap collapse" id="s-filter{{$key}}">                   
                        <ul class="shop-w__list gl-scroll">
                            @php $filterValues = ProductsFilter::selectedFilters($categoryDetails['catIds'], $filter); @endphp
                            @foreach ($filterValues as $fkey => $filterValue) 
                                <?php /*
                                    // Highlight filter value selector
                                    if (isset($_GET['color']) && !empty($_GET['color'])) {                            
                                        $colors = explode('~', $_GET['color']);  
                                        if (!empty($colors) && in_array($color, $colors)) {
                                            $colorChecked = "checked";
                                        } else {
                                            $colorChecked = "";
                                        }
                                    } else {
                                        $colorChecked = "";
                                    }
                                */?>
                                <li>
                                    <!--====== Check Box ======-->
                                    <div class="check-box">
                                        <input type="checkbox" id="filtervalue{{$fkey}}" name="filter" value="{{$filterValue}}" class="filterAjax">
                                        <div class="check-box__state check-box__state--primary">
                                            <label class="check-box__label" for="xs">{{ $filterValue }}</label>
                                        </div>
                                    </div>
                                    <!--====== End - Check Box ======-->
                                </li>        
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>            
        @endforeach
    </div>
</div>
