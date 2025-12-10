<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\Alert;

class StockTransactionSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {

            for ($i = 0; $i < 5; $i++) {

                $type = fake()->randomElement(['IN', 'OUT']);
                $qty = fake()->numberBetween(1, 15);

                if ($type === 'OUT' && $qty > $product->stock_count) {
                    $type = 'IN';
                }

                if ($type === 'IN') {
                    $product->stock_count += $qty;
                } else {
                    $product->stock_count -= $qty;
                }

                $product->save();

                StockTransaction::create([
                    'product_id' => $product->id,
                    'type' => $type,
                    'quantity' => $qty,
                    'note' => fake()->sentence(4),
                ]);

                $alert = Alert::where('product_id', $product->id)
                    ->where('status', 'open')
                    ->first();

                if ($product->stock_count < $product->min_stock) {

                    if (!$alert) {
                        Alert::create([
                            'product_id' => $product->id,
                            'status' => 'open',
                        ]);
                    }

                } else {

                    if ($alert) {
                        $alert->update(['status' => 'closed']);
                    }
                }
            }
        }
    }
}
