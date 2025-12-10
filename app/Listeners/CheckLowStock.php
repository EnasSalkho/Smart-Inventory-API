<?php

namespace App\Listeners;

use App\Events\StockUpdated;
use App\Models\Alert;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckLowStock
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StockUpdated $event)
    {
        $product = $event->product;

        if ($product->stock_count < $product->min_stock) {
            Alert::firstOrCreate([
                'product_id' => $product->id,
                'status'     => 'open',
            ]);
        }

        if ($product->stock_count >= $product->min_stock) {
            Alert::where('product_id', $product->id)
                ->where('status', 'open')
                ->update(['status' => 'closed']);
        }
    }
}
