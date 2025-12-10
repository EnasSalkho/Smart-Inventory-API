<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\StockTransactionResource;
use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function currentStocks()
    {
        $products = Product::select('id','name','stock_count','min_stock')->get();

        return response()->json($products);
    }
    public function lowStockProducts()
    {
        $products = Product::with('category')->whereColumn('stock_count', '<', 'min_stock')->get();

        return response()->json($products);
    }
    public function productTransactions($id)
    {
        $product = Product::findOrFail($id);

        $transactions = StockTransaction::where('product_id', $id)->latest()->get();

        return response()->json([
            'product' => $product->name,
            'transactions' => $transactions
        ]);
    }
}
