<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'product_id' => $this->product_id,
            'product_name' => $this->product ? $this->product->name : null,
            'type'       => $this->type,
            'quantity'   => $this->quantity,
            'note'       => $this->note,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
