<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function (){
//     return view('welcome');
// });

Route::controller(HomeController::class)->group(function (){

    Route::get('/',[HomeController::class,"Index"]);

    Route::get('/about',[HomeController::class,"About"]);

    Route::get('/redirect',[HomeController::class,"Redirect"]);

    // search
    Route::get('/search',[HomeController::class,"search"]);

    // add cart route
    Route::post('/addcart/{id}',[HomeController::class,"addcart"]);

    // show cart route
    Route::get('/showcart',[HomeController::class,"showcart"]);

    // delete from cart
    Route::get('/deletecart/{id}',[HomeController::class,"deletecart"]);

    // confirm order
    Route::post('/order',[HomeController::class,"confirmorder"]);

});

Route::controller(AdminController::class)->group(function (){

    Route::get('/product',[AdminController::class,"Product"]);
    
    Route::get('/index',[AdminController::class,"Index"]);

    Route::post('/uploadproduct',[AdminController::class,"uploadproduct"]);

    Route::get('/showproduct',[AdminController::class,"showproduct"]);

    Route::get('/deleteproduct/{id}',[AdminController::class,"deleteproduct"]);

    Route::get('/updateview/{id}',[AdminController::class,"updateview"]);

    Route::post('/updateproduct/{id}',[AdminController::class,"updateproduct"]);

    // show orders
    Route::get('/showorder',[AdminController::class,"showorder"]);

    // update status
    Route::get('/updatestatus/{id}',[AdminController::class,"updatestatus"]);


});











Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
