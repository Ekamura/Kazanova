<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'id'=>$this->id,
          'name_product' => $this->product->name_product,
          'price_in_rub' => $this->price_in_rub,
          'count' => $this->count,
          'user' => $this->user_id,
        ];
    }
}
