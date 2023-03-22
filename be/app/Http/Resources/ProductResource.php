<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name_product'      => $this->name_product,
            'image_product'     => $this->image_product,
            'image_product_2'   => $this->image_product_2,
            'image_product_3'   => $this->image_product_3,
            'price_product'     => $this->price_product,
            'desc_sort'         => $this->desc_sort,
            'desc'              => $this->desc,
            'created_by'        => $this->created_by,
            'updated_by'        => $this->updated_by,
//            'status'            => ProductStatusEnum::getValue($this->status),
            'status'            => $this->status,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'category'          => new CategoryResource(Category::find($this->id_category)),
        ];
    }
}
