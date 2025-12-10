<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockTransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::post('/stock/in', [StockTransactionController::class, 'stockIn']);
    Route::post('/stock/out', [StockTransactionController::class, 'stockOut']);
    Route::get('/stock/history', [StockTransactionController::class, 'history']);
    Route::get('/alerts/low-stock', [AlertController::class, 'lowStockProducts']);
    Route::get('/alerts/current', [AlertController::class, 'currentAlerts']);
});
Route::prefix('reports')->group(function () {
    Route::get('stockLevels', [ReportController::class, 'currentStocks']);
    Route::get('lowStock', [ReportController::class, 'lowStockProducts']);
    Route::get('products/{id}/transactions', [ReportController::class, 'productTransactions']);
});
