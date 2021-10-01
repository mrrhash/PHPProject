<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeliveryTypeController;
use App\Http\Controllers\UserController;
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

    //Routes For Payment Types

    Route::get('admin/payment_type',[PaymentTypeController::class,'index']);

    Route::get('admin/addpayment_type',function(){ return view('Admin.addpayment_type'); });

    Route::post('admin/storepayment_type',[PaymentTypeController::class,'store']);

    Route::get('admin/editpayment_type/{id}',[PaymentTypeController::class,'edit']);

    Route::put('admin/updatepayment_type/{id}',[PaymentTypeController::class,'update']);
    
    Route::delete('admin/deletepayment_type/{id}',[PaymentTypeController::class, 'destroy' ]);

    //Routes For Delivery Types

    Route::get('admin/delivery_type',[DeliveryTypeController::class,'index']);

    Route::get('admin/adddelivery_type',function(){ return view('Admin.adddelivery_type'); });

    Route::post('admin/storedelivery_type',[DeliveryTypeController::class,'store']);

    Route::get('admin/editdelivery_type/{id}',[DeliveryTypeController::class,'edit']);

    Route::put('admin/updatedelivery_type/{id}',[DeliveryTypeController::class,'update']);   

    Route::delete('admin/deletedelivery_type/{id}',[DeliveryTypeController::class, 'destroy' ]);

    //Routes For Employees

    Route::get('admin/employee',[EmployeeController::class,'index']);

    Route::get('admin/addemployee',function(){ return view('Admin.addemployee'); });

    Route::post('admin/storeemployee',[EmployeeController::class,'store']);

    Route::get('admin/editemployee/{id}',[EmployeeController::class,'edit']);

    Route::put('admin/updateemployee/{id}',[EmployeeController::class,'update']);

    Route::get('admin/employeestatus/{status}/{id}',[EmployeeController::class, 'status' ]);

    Route::delete('admin/deleteemployee/{id}',[EmployeeController::class, 'destroy' ]);

    //Routes For Orders

    Route::get('admin/order',[OrderController::class,'index']);   

    Route::get('admin/orderdetails/{id}',[OrderController::class,'details']);   

    Route::get('admin/orderstatus/{status}/{id}',[OrderController::class, 'status' ]);

    Route::delete('admin/deleteorder/{id}',[OrderController::class, 'destroy' ]);

    //Routes For Products

    Route::get('admin/products',[ProductController::class,'index']);

    Route::get('admin/addproduct', [ProductController::class,'create']);

    Route::post('admin/storeproduct',[ProductController::class,'store']);

    Route::get('admin/editproduct/{id}',[ProductController::class,'edit']);

    Route::put('admin/updateproduct/{id}',[ProductController::class,'update']);   

    Route::delete('admin/deleteproduct/{id}',[ProductController::class, 'destroy' ]);

     //Routes For Users

     Route::get('admin/users',[UserController::class,'index']);
});
