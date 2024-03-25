<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Front\AddressController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#######################################
# Clear-cache System
#######################################
Route::get('/clear-cache', function () {
    //Artisan::call('composer clear-cache');
    //Artisan ::call('key:generate');
    //Artisan::call('composer dump-autoload');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('clear-compiled');
    Artisan::call('view:clear');    
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('queue:restart');    
    return "Cache is cleared";
});

Route::get('/', function () {
    return view('welcome');
});

// FRONT
Route::group([],function () {
    Route::get('/', [IndexController::class, 'index']);

    ###############################################################
    ####################   PRODUCT AND CART    $###################
    ###############################################################

    // Listing/Categories Routes (Parent>SubCategory>SubSubCategory)
    $catUrls = Category::select('url')->where('status', 1)->get()->pluck('url');                                // Get all urls
    foreach ($catUrls as $key => $url) {        
        Route::get($url, [ProductController::class, 'listing']);
    }

    // Product Detail Page
    Route::get('product/{id}', [ProductController::class, 'detail']);

    // Get Product Attribute Price
    Route::post('get-attribute-size', [ProductController::class, 'getAttributePrice']);

    // Add to Cart
    Route::post('/add-to-cart', [ProductController::class, 'addToCart']);

    // Shopping Cart
    Route::get('cart', [ProductController::class, 'cart']);

    // Update Cart Item
    Route::post('update-cart-item-qty', [ProductController::class, 'updateCartItemQty']);

    // Delete Cart Item
    Route::post('delete-cart-item', [ProductController::class, 'deleteCartItem']);

    // Empty Cart
    Route::post('empty-cart', [ProductController::class, 'emptyCart']);

    ###############################################################
    ####################      USER LOGIN       $###################
    ###############################################################
    
    // User Login
    Route::match(['get', 'post'], 'user/login', [UserController::class, 'loginUser'])->name('login');

    // User Register
    Route::match(['get', 'post'], 'user/register', [UserController::class, 'registerUser']);

    // User Confirm Account
    Route::match(['get', 'post'], 'user/confirm/{code}', [UserController::class, 'confirmAccount']);

    Route::middleware(['auth'])->group(function () {
        
        // User Account
        Route::match(['get', 'post'], 'user/account', [UserController::class, 'account']);

        // User Change Password
        Route::match(['get', 'post'], 'user/update-password', [UserController::class, 'updatePassword']);
        
        // User Logout 
        Route::match(['get', 'post'], 'user/logout', [UserController::class, 'logoutUser']);

        // Apply Coupon
        Route::post('/apply-coupon', [ProductController::class, 'applyCoupon']);

        // Checkout
        Route::match(['get', 'post'], '/checkout', [ProductController::class, 'checkout']);

        // Save Delivery Address
        Route::post('/save-delivery-address', [AddressController::class, 'saveDeliveryAddress']);

        // Get Delivery Address
        Route::post('/get-delivery-address', [AddressController::class, 'getDeliveryAddress']);

        // Remove Delivery Address
        Route::post('/remove-delivery-address', [AddressController::class, 'removeDeliveryAddress']);
        
    });

    // Forgot Password
    Route::match(['get', 'post'], 'user/forgot-password', [UserController::class, 'forgotPassword']);

    // Reset Password (code is require only in GET reset password link that passing the code from mailbox to ui reset password)
    Route::match(['get', 'post'], 'user/reset-password/{code?}', [UserController::class, 'resetPassword']);

});

// ADMIN
Route::group(['prefix' => 'admin'], function () {                                                               // Option 1     
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);                                  // match(['get', 'post'] digunakan krn pd ui yang ada get dan ada post mehod
    //Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Buat group pengguna admin dalam group admin
    // Protect dari user berstatus bukan admin dapat akses ke admin layout
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::match(['get', 'post'], 'update-password', [AdminController::class, 'updatePassword']); 
        Route::match(['get', 'post'], 'update-details', [AdminController::class, 'updateDetails']);                       
        Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword'])->name('checkcurrentpassword');
        Route::get('logout', [AdminController::class, 'logout']);

        #Display CMS Pages (CRUD - READ)
        Route::get('cms-pages', [CmsPageController::class, 'index']);
        Route::post('update-cms-page-status', [CmsPageController::class, 'update']);
        //masukkan tanda ? ke dlm {id?}. maksudnya jika ada id maka link akan aktif sbg add-edit-cms-page/{id?} utk edit
        //jika tidak ia akan jadi [add-edit-cms-page] utk digunakan sbg link create
        Route::match(['get', 'post'],'add-edit-cms-page/{id?}', [CmsPageController::class, 'edit']);
        Route::get('delete-cms-page/{id?}', [CmsPageController::class, 'destroy']);

        #Subadmins
        Route::get('subadmins', [AdminController::class, 'subadmins']);
        Route::post('update-subadmin-status', [AdminController::class, 'updateSubadminStatus']);
        Route::match(['get', 'post'],'add-edit-subadmin/{id?}', [AdminController::class, 'addEditSubadmin']);
        Route::get('delete-subadmin/{id?}', [AdminController::class, 'deleteSubadmin']);
        Route::match(['get', 'post'], 'update-role/{id}', [AdminController::class, 'updateRole']);

        #Categories
        Route::get('categories', [CategoryController::class, 'categories']);
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);
        Route::match(['get', 'post'], 'add-edit-category/{id?}', [CategoryController::class, 'addEditCategory']);
        Route::get('delete-category-image/{id?}', [CategoryController::class, 'deleteCategoryImage']);
        Route::get('delete-category/{id?}', [CategoryController::class, 'deleteCategory']);

        #Products              
        Route::get('products', [ProductsController::class, 'products']);
        Route::post('update-product-status', [ProductsController::class, 'updateProductStatus']);
        Route::get('delete-product/{id?}', [ProductsController::class, 'deleteProduct']);
        Route::match(['get', 'post'], 'add-edit-product/{id?}', [ProductsController::class, 'addEditProduct']);

        //Product Images
        Route::get('delete-product-image/{id?}', [ProductsController::class, 'deleteProductImage']);

        //Product Video
        Route::get('delete-product-video/{id?}', [ProductsController::class, 'deleteProductVideo']);

        //Product Attributes
        Route::post('update-attribute-status', [ProductsController::class, 'updateAttributeStatus']);
        Route::get('delete-attribute/{id?}', [ProductsController::class, 'deleteAttribute']);   

        #Brands 
        Route::get('brands', [BrandController::class, 'brands']);
        Route::post('update-brand-status', [BrandController::class, 'updateBrandStatus']);
        Route::get('delete-brand/{id?}', [BrandController::class, 'deleteBrand']);
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', [BrandController::class, 'addEditBrand']);
        Route::get('delete-brand-image/{id?}', [BrandController::class, 'deleteBrandImage']);
        Route::get('delete-brand-logo/{id?}', [BrandController::class, 'deleteBrandLogo']);

        #Banners 
        Route::get('banners', [BannersController::class, 'banners']);
        Route::post('update-banner-status', [BannersController::class, 'updateBannerStatus'])->name('banners.updateBannerStatus');
        Route::get('delete-banner/{id?}', [BannersController::class, 'deleteBanner']);
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', [BannersController::class, 'addEditBanner']);
        Route::get('delete-banner-image/{id?}', [BannersController::class, 'deleteBannerImage']);

        #Coupons or Vouchers
        Route::get('coupons', [CouponsController::class, 'coupons']);
        Route::post('update-coupon-status', [CouponsController::class, 'updateCouponStatus']);
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', [CouponsController::class, 'addEditCoupon']);
        Route::get('delete-coupon/{id?}', [CouponsController::class, 'deleteCoupon']);

        #Users
        Route::get('users', [UsersController::class, 'users']);
        Route::post('update-user-status', [UsersController::class, 'updateUserStatus']);
    });    
});                                        


// Perform group link
// Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {        // Option 2
//     Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');   
// });