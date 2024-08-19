<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PubUserController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// public routes

Route::get('/home', [PubUserController::class, 'home']
)->name('home');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/about_us', [PubUserController::class, 'about_us']
)->name('about_us');


Route::get('/procats', [PubUserController::class, 'procats']
)->name('procats');

Route::get('/procat_products/{procat_id}', [PubUserController::class, 'procat_products']
)->name('procat_products');

Route::get('/sercats', [PubUserController::class, 'sercats']
)->name('sercats');

Route::get('/sercat_services/{sercat_id}', [PubUserController::class, 'sercat_services']
)->name('sercat_services');

Route::get('/activities', [PubUserController::class, 'activities']
)->name('activities');

Route::get('/contact_us', [PubUserController::class, 'contact_us']
)->name('contact_us');
Route::post('/contact_us_info', [PubUserController::class, 'contact_us_info']
)->name('contact_us_info');



// admin panel routes



Route::get('/admin_login', [AdminUserController::class, 'admin_login']
)->name('admin_login')->middleware('logged_in_admin');

Route::post('/check_login', [AdminUserController::class, 'check_login']
)->name('check_login');

Route::get('/admin_register', [AdminUserController::class, 'admin_register']
)->name('admin_register');

Route::post('/admin_register_info', [AdminUserController::class, 'admin_register_info']
)->name('admin_register_info');

Route::prefix('/admin')->middleware('admin')->group(function(){

    Route::get('dashboard', [AdminUserController::class, 'dashboard']
    )->name('admin.dashboard');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // product

    Route::get('add_product', [ProductController::class, 'add_product']
    )->name('admin.add_product');

    Route::post('add_product_info', [ProductController::class, 'add_product_info']
    )->name('admin.add_product_info');

    Route::get('products', [ProductController::class, 'products']
    )->name('admin.products');

    Route::get('update_product/{product_id}', [ProductController::class, 'update_product']
    )->name('admin.update_product');

    Route::post('update_product_info', [ProductController::class, 'update_product_info']
    )->name('admin.update_product_info');

    Route::get('delete_product/{product_id}', [ProductController::class, 'delete_product']
    )->name('admin.delete_product');

    // activity

    Route::get('add_activity', [ActivityController::class, 'add_activity']
    )->name('admin.add_activity');

    Route::post('add_activity_info', [ActivityController::class, 'add_activity_info']
    )->name('admin.add_activity_info');

    Route::get('activities', [ActivityController::class, 'activities']
    )->name('admin.activities');

    Route::get('update_activity/{activity_id}', [ActivityController::class, 'update_activity']
    )->name('admin.update_activity');

    Route::post('update_activity_info', [ActivityController::class, 'update_activity_info']
    )->name('admin.update_activity_info');

    Route::get('delete_activity/{activity_id}', [ActivityController::class, 'delete_activity']
    )->name('admin.delete_activity');


    // product category

    Route::get('add_procat', [ProductCategoryController::class, 'add_procat']
    )->name('admin.add_procat');

    Route::post('add_procat_info', [ProductCategoryController::class, 'add_procat_info']
    )->name('admin.add_procat_info');

    Route::get('procats', [ProductCategoryController::class, 'procats']
    )->name('admin.procats');

    Route::get('update_procat/{procat_id}', [ProductCategoryController::class, 'update_procat']
    )->name('admin.update_procat');

    Route::post('update_procat_info', [ProductCategoryController::class, 'update_procat_info']
    )->name('admin.update_procat_info');

    Route::get('delete_procat/{procat_id}', [ProductCategoryController::class, 'delete_procat']
    )->name('admin.delete_procat');


    // service category

    Route::get('add_sercat', [ServiceCategoryController::class, 'add_sercat']
    )->name('admin.add_sercat');

    Route::post('add_sercat_info', [ServiceCategoryController::class, 'add_sercat_info']
    )->name('admin.add_sercat_info');

    Route::get('sercats', [ServiceCategoryController::class, 'sercats']
    )->name('admin.sercats');

    Route::get('update_sercat/{sercat_id}', [ServiceCategoryController::class, 'update_sercat']
    )->name('admin.update_sercat');

    Route::post('update_sercat_info', [ServiceCategoryController::class, 'update_sercat_info']
    )->name('admin.update_sercat_info');

    Route::get('delete_sercat/{sercat_id}', [ServiceCategoryController::class, 'delete_sercat']
    )->name('admin.delete_sercat');

    // service

    Route::get('add_service', [ServiceController::class, 'add_service']
    )->name('admin.add_service');

    Route::post('add_service_info', [ServiceController::class, 'add_service_info']
    )->name('admin.add_service_info');

    Route::get('services', [ServiceController::class, 'services']
    )->name('admin.services');

    Route::get('update_service/{service_id}', [ServiceController::class, 'update_service']
    )->name('admin.update_service');

    Route::post('update_service_info', [ServiceController::class, 'update_service_info']
    )->name('admin.update_service_info');

    Route::get('delete_service/{service_id}', [ServiceController::class, 'delete_service']
    )->name('admin.delete_service');


});


Route::get('/logout', [LogOutController::class, 'logout']
)->name('logout');




