<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_code'    => $this->order_code,
            'order_date'    => $this->order_date,
            'pay_method'    => $this->pay_method,
            'pay_status'    => $this->pay_status,
            'user'          => new UserResource(User::find($this->id_user)),
            'product'       => new ProductResource(Product::find($this->id_product)),
            'price_product' => $this->price_product,
            'quantity'      => $this->quantity,
            'toping'        => $this->toping,
            'status'        => $this->status,
        ];
    }
}
