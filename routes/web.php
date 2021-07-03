<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[AdminController::class,'index']);
Route::post('auth',[AdminController::class,'authentication']);

Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/dashboard', function(){ return view('Admin.dashboard');});

    //Routes For Categories

    Route::get('admin/categories',[CategoryController::class, 'index']);

    Route::post('admin/storecategory',[CategoryController::class, 'store']);

    Route::get('admin/addcategory',function(){ return view('Admin.addcategory'); });

    Route::delete('admin/deletecategory/{id}',[CategoryController::class, 'delete']);

    Route::get('admin/editcategory/{id}',[CategoryController::class, 'edit' ]);
    
    Route::put('admin/updatecategory/{id}',[CategoryController::class, 'update' ]);

    Route::get('admin/categorystatus/{status}/{id}',[CategoryController::class, 'status' ]);

    //Routes For Session

    Route::get('admin/logout', function(){
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('error','Logout SuccessFully');
            return redirect('login');
    });

    //Routes For Coupons

    Route::get('admin/coupon',[CouponController::class,'index']);

    Route::get('admin/addcoupon',function(){ return view('Admin.addcoupon'); });

    Route::post('admin/storecoupon',[CouponController::class,'store']);

    Route::get('admin/editcoupon/{id}',[CouponController::class,'edit']);

    Route::put('admin/updatecoupon/{id}',[CouponController::class,'update']);

    Route::get('admin/couponstatus/{status}/{id}',[CouponController::class, 'status' ]);

    Route::delete('admin/deletecoupon/{id}',[CouponController::class, 'destroy' ]);

    //Routes For Sizes

    Route::get('admin/size',[SizeController::class,'index']);

    Route::get('admin/addsize',function(){ return view('Admin.addsize'); });

    Route::post('admin/storesize',[SizeController::class,'store']);

    Route::get('admin/editsize/{id}',[SizeController::class,'edit']);

    Route::put('admin/updatesize/{id}',[SizeController::class,'update']);

    Route::get('admin/sizestatus/{status}/{id}',[SizeController::class, 'status' ]);

    Route::delete('admin/deletesize/{id}',[SizeController::class, 'destroy' ]);

    //Routes For Colors

    Route::get('admin/color',[ColorController::class,'index']);

    Route::get('admin/addcolor',function(){ return view('Admin.addcolor'); });

    Route::post('admin/storecolor',[ColorController::class,'store']);

    Route::get('admin/editcolor/{id}',[ColorController::class,'edit']);

    Route::put('admin/updatecolor/{id}',[ColorController::class,'update']);

    Route::get('admin/colorstatus/{status}/{id}',[ColorController::class, 'status' ]);

    Route::delete('admin/deletecolor/{id}',[ColorController::class, 'destroy' ]);

    //Routes For Brands

    Route::get('admin/brand',[BrandController::class,'index']);

    Route::get('admin/addbrand',function(){ return view('Admin.addbrand'); });

    Route::post('admin/storebrand',[BrandController::class,'store']);

    Route::get('admin/editbrand/{id}',[BrandController::class,'edit']);

    Route::put('admin/updatebrand/{id}',[BrandController::class,'update']);

    Route::get('admin/brandstatus/{status}/{id}',[BrandController::class, 'status' ]);

    Route::delete('admin/deletebrand/{id}',[BrandController::class, 'destroy' ]);

    //Routes For Products

    Route::get('admin/product',[ProductController::class,'index']);

    Route::get('admin/addproduct', [ProductController::class,'create']);

    Route::post('admin/storeproduct',[ProductController::class,'store']);

    Route::get('admin/editproduct/{id}',[ProductController::class,'edit']);

    Route::put('admin/updateproduct/{id}',[ProductController::class,'update']);

    Route::get('admin/productstatus/{status}/{id}',[ProductController::class, 'status' ]);

    Route::delete('admin/deleteproduct/{id}',[ProductController::class, 'destroy' ]);
});
