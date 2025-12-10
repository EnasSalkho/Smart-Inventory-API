<?php

namespace App\Models;

use App\Events\StockUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description','price','stock_count','min_stock'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(StockTransaction::class);
    }

    public function alert()
    {
        return $this->hasOne(Alert::class)->where('status', 'open');
    }

    public function fireStockEvent() : void
    {
        StockUpdated::dispatch($this);
    }
}
