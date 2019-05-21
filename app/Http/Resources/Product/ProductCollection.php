<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'totalPrice' => round((1-($this->discount/100)) * $this->price),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),1) : '평점 없음',
            'discount' => $this->discount,
            'user_id' => $this->user_id,
            'href' => [
                'link' => route('products.show',$this->id)
            ]

        ];
    }
}
