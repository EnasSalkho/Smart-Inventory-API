<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Http\Resources\StockTransactionResource;
use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    public function stockIn(StockRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        $transaction = StockTransaction::create([
            'product_id' => $product->id,
            'type'       => 'in',
            'quantity'   => $request->quantity,
            'note'       => $request->note,
        ]);

        $product->stock_count += $request->quantity;
        $product->save();

        $product->fireStockEvent();

        return new StockTransactionResource($transaction);
    }
    public function stockOut(StockRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock_count) {
            return response()->json([
                'message' => 'Not enough stock available'
            ], 422);
        }

        $transaction = StockTransaction::create([
            'product_id' => $product->id,
            'type'       => 'out',
            'quantity'   => $request->quantity,
            'note'       => $request->note,
        ]);

        $product->stock_count -= $request->quantity;
        $product->save();


        $product->fireStockEvent();

        return new StockTransactionResource($transaction);
    }
    public function history(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $transactions = StockTransaction::where('product_id', $request->product_id)->latest()->get();

        return StockTransactionResource::collection($transactions);
    }


}
