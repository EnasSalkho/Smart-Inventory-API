<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlertResource;
use App\Models\Alert;
use App\Models\Product;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function lowStockProducts()
    {
        $products = Product::whereColumn('stock_count', '<', 'min_stock')->with('alert')->get();

        return response()->json([
            'data' => $products
        ]);
    }
    public function currentAlerts()
    {
        $alerts = Alert::where('status', 'open')->with('product')->get();

        return AlertResource::collection($alerts);
    }
}
