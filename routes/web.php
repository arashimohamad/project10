<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\CategoryController;

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
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('clear-compiled');
    //Artisan::call('composer dump-autoload');
    Artisan::call('view:clear');    
    Artisan::call('optimize:clear');
    Artisan::call('queue:restart');    
    return "Cache is cleared";
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {                                             // Option 1     
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);                // match(['get', 'post'] digunakan krn pd ui ada get dan ada post
    //Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Buat group pengguna admin dalam group admin
    // Protect dari user berstatus bukan admin dapat akses ke admin layout
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::match(['get', 'post'], 'update-password', [AdminController::class, 'updatePassword']); 
        Route::match(['get', 'post'], 'update-details', [AdminController::class, 'updateDetails']);                       
        Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword'])->name('checkcurrentpassword');
        Route::get('logout', [AdminController::class, 'logout']);

        //Display CMS Pages (CRUD - READ)
        Route::get('cms-pages', [CmsPageController::class, 'index']);
        Route::post('update-cms-page-status', [CmsPageController::class, 'update']);
        //masukkan tanda ? ke dlm {id?}. maksudnya jika ada id maka link akan aktif sbg add-edit-cms-page/{id?} utk edit
        //jika tidak ia akan jadi [add-edit-cms-page] utk digunakan sbg link create
        Route::match(['get', 'post'],'add-edit-cms-page/{id?}', [CmsPageController::class, 'edit']);
        Route::get('delete-cms-page/{id?}', [CmsPageController::class, 'destroy']);

        //Subadmins
        Route::get('subadmins', [AdminController::class, 'subadmins']);
        Route::post('update-subadmin-status', [AdminController::class, 'updateSubadminStatus']);
        Route::match(['get', 'post'],'add-edit-subadmin/{id?}', [AdminController::class, 'addEditSubadmin']);
        Route::get('delete-subadmin/{id?}', [AdminController::class, 'deleteSubadmin']);
        Route::match(['get', 'post'], 'update-role/{id}', [AdminController::class, 'updateRole']);

        //Categories
        Route::get('categories', [CategoryController::class, 'categories']);
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);
        Route::get('delete-category/{id?}', [CategoryController::class, 'deleteCategory']);


    });    
});                                        


// Perform group link
// Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {        // Option 2
//     Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');   
// });

