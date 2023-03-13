<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');



Route::group([
    'prefix' => 'customers',
    'namespace' => 'Customers'
], function () {

    Route::get('/filter', [CustomersController::class, 'filter'])->name('api.customers.filter');

    Route::post('/store', [CustomersController::class, 'store'])->name('api.customers.store');

    Route::delete('/{customer_id}/destroy', [CustomersController::class, 'destroy'])->name('api.customers.destroy');
});
