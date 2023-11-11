@php
    use App\Models\ProductsFilter;
    use App\Models\Category;
    // Get Categories and their Sub Categories
    $categories = Category::getCategories();
    $url = Route::getFacadeRoot()->current()->uri;
    $categoryDetails = Category::categoryDetails($url);
    // dd($categoryDetails['categoryDetails']['parentcategory']['category_name']);
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
                        {{-- Category > Sub Category > Sub Sub Category  --}}
                        @foreach ($categories as $category)
                            <li class="has-list">
                                <a href="#">{{ $category->category_name }}</a>
                                <span class="js-shop-category-span @if (count($category->subcategories)) is-expanded fas fa-plus @endif u-s-m-l-6"></span>
                                @if (count($category->subcategories))
                                    <ul style="display:block">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li class="has-list">
                                                <a  @if (isset($categoryDetails['categoryDetails']['parentcategory']['category_name']) && $categoryDetails['categoryDetails']['parentcategory']['category_name'] == $subcategory['category_name'])
                                                        style="color:#ff4500"
                                                    @elseif (isset($categoryDetails['categoryDetails']['category_name']) && $categoryDetails['categoryDetails']['category_name'] == $subcategory['category_name'])
                                                        style="color:#ff4500"
                                                    @endif href="{{ url($subcategory->url) }}">{{ $subcategory->category_name }}
                                                </a>
                                                <span class="js-shop-category-span @if (count($subcategory->subcategories)) fas fa-plus @endif u-s-m-l-6"></span>
                                                @if (count($subcategory->subcategories))
                                                    <ul>
                                                        @foreach ($subcategory->subcategories as $subsubcat)
                                                            <li>
                                                                <a  @if (isset($categoryDetails['categoryDetails']['parentcategory']['category_name']) && $categoryDetails['categoryDetails']['parentcategory']['category_name'] == $subsubcat['category_name'])
                                                                        style="color:#ff4500"
                                                                    @elseif (isset($categoryDetails['categoryDetails']['category_name']) && $categoryDetails['categoryDetails']['category_name'] == $subsubcat['category_name'])
                                                                        style="color:#ff4500"
                                                                    @endif href="{{ url($subsubcat->url) }}">{{ $subsubcat->category_name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>                                        
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
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
                    @php $getSizes = ProductsFilter::getSizes($categoryDetails['catIds']) @endphp
                    <ul class="shop-w__list gl-scroll">
                        @foreach ($getSizes as $key => $size)
                            <?php
                                // Highlight size selector
                                if (isset($_GET['size']) && !empty($_GET['size'])) {                            
                                    $sizes = explode('~', $_GET['size']);  
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
                    @php $getBrands = ProductsFilter::getBrands($categoryDetails['catIds']) @endphp
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
                        <h1 class="shop-w__h">{{ strtoupper($filter) }}</h1>
                        <span class="fas fa-minus shop-w__toggle" data-target="#s-filter{{$key}}" data-toggle="collapse"></span>
                    </div>
                    <div class="shop-w__wrap collapse show" id="s-filter{{$key}}">                   
                        <ul class="shop-w__list gl-scroll">
                            @php $filterValues = ProductsFilter::selectedFilters($categoryDetails['catIds'], $filter); @endphp
                            @foreach ($filterValues as $fkey => $filterValue) 
                                @php $filterChecked = "" @endphp
                                @if(isset($_GET[$filter]))
                                    @php $explodeFilters = explode('~',$_GET[$filter]) @endphp
                                    @if (in_array($filterValue, $explodeFilters))
                                        @php $filterChecked = "checked" @endphp
                                    @endif
                                @endif
                                <li>
                                    <!--====== Check Box ======-->
                                    <div class="check-box">
                                        <input type="checkbox" id="filter{{$fkey}}" name="{{$filter}}" value="{{$filterValue}}" class="filterAjax" {{ $filterChecked }}>
                                        <div class="check-box__state check-box__state--primary">
                                            <label class="check-box__label" for="filter{{$fkey}}">{{ $filterValue }}</label>
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
