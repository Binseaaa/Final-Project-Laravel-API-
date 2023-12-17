<?php


use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasedItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SoldItemsController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//merchandise
Route::get('/merchandises/{merchandise}', [MerchandiseController::class, 'view']);
Route::patch('/merchandises/{merchandise}', [MerchandiseController::class, 'update']);
Route::put('/merchandises/{merchandise}', [MerchandiseController::class, 'update']);
Route::delete('/merchandises/{merchandise}', [MerchandiseController::class, 'destroy']);

Route::get('/merchandises', [MerchandiseController::class, 'index']);
Route::post('/merchandises', [MerchandiseController::class, 'store']);

//supplier
Route::get('/suppliers/{supplier}', [SupplierController::class, 'view']);
Route::patch('/suppliers/{supplier}', [SupplierController::class, 'update']);
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update']);
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy']);

Route::get('/suppliers', [SupplierController::class, 'index']);
Route::post('/suppliers', [SupplierController::class, 'store']);

//customer
Route::get('/customers/{customer}', [CustomerController::class, 'view']);
Route::patch('/customers/{customer}', [CustomerController::class, 'update']);
Route::put('/customers/{customer}', [CustomerController::class, 'update']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);

Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);

//purchases
Route::get('/purchases/{purchase}', [PurchaseController::class, 'view']);
Route::patch('/purchases/{purchase}', [PurchaseController::class, 'update']);
Route::put('/purchases/{purchase}', [PurchaseController::class, 'update']);
Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy']);

Route::get('/purchases', [PurchaseController::class, 'index']);
Route::post('/purchases', [PurchaseController::class, 'store']);

//purchased items
Route::get('/purchasedItems/{purchasedItem}', [PurchasedItemController::class, 'view']);
Route::patch('/purchasedItems/{purchasedItem}', [PurchasedItemController::class, 'update']);
Route::put('/purchasedItems/{purchasedItem}', [PurchasedItemController::class, 'update']);
Route::delete('/purchasedItems/{purchasedItem}', [PurchasedItemController::class, 'destroy']);

Route::get('/purchasedItems', [PurchasedItemController::class, 'index']);
Route::post('/purchasedItems', [PurchasedItemController::class, 'store']);

//sales
Route::get('/sales/{sale}', [SaleController::class, 'view']);
Route::patch('/sales/{sale}', [SaleController::class, 'update']);
Route::put('/sales/{sale}', [SaleController::class, 'update']);
Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);

Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);

//sold items
Route::get('/soldItems/{soldItem}', [SoldItemsController::class, 'view']);
Route::patch('/soldItems/{soldItem}', [SoldItemsController::class, 'update']);
Route::put('/soldItems/{soldItem}', [SoldItemsController::class, 'update']);
Route::delete('/soldItems/{soldItem}', [SoldItemsController::class, 'destroy']);

Route::get('/soldItems', [SoldItemsController::class, 'index']);
Route::post('/soldItems', [SoldItemsController::class, 'store']);
