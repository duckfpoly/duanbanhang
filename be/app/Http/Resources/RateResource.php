<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'rate_star'     => $this->rate_star,
            'content'       => $this->content,
            'rate_at'       => $this->rate_at,
            'user'          => new UserResource(User::find($this->id_user)),
            'product'       => new ProductResource(Product::find($this->id_user)),
        ];
    }
}
