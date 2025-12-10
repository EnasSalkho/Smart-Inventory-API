<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *'id'          => $this->id,
     * 'name'        => $this->name,
     * 'description' => $this->description,
     * 'created_at'  => $this->created_at->toDateTimeString(),
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock_count' => $this->stock_count,
            'min_stock' => $this->min_stock,
            'category' => $this->category ? $this->category->name : null,
            'low_stock' => $this->stock_count < $this->min_stock,
        ];
    }
}
