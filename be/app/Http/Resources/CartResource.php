<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image_product,
            'price' => $this->price_product,
            'quantity' => $this->quantity,
            'toping' => $this->toping,
            'user' => new UserResource(User::find($this->id_user)),
            'product' => new ProductResource(Product::find($this->id_product)),
        ];
    }
}
