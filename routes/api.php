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


header("Cache-Control: max-age");
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, DELETE');
header('Access-Control-Allow-Headers:  Content-Type');



Route::group([
    'prefix' => 'customers',
    'namespace' => 'Customers'
], function () {

    Route::get('/filter', [CustomersController::class, 'filter'])->name('api.customers.filter');

    Route::post('/store', [CustomersController::class, 'store'])->name('api.customers.store');

    Route::delete('/{customer_id}/destroy', [CustomersController::class, 'destroy'])->name('api.customers.destroy');
});
