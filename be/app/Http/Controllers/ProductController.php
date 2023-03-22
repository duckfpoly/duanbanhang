<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatusEnum;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    private Product $model;
    private string $message;

    public function __construct()
    {
        $this->model = new Product();
        $this->message = 'No product !';
    }
    public function index(){
        return ProductResource::collection($this->model->all());
    }
    public function show($productId){
        $object = $this->model->find($productId);
        if($object){
            $arr = [
                'status' => true,
                'data'   => new ProductResource($object)
            ];
        }
        else {
            $arr = [
                'status'  => false,
                'message' => $this->message
            ];
        }
        return response()->json($arr);
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name_product'      => 'bail|required|string|unique:App\Models\Product,name_product',
            'image_product'     => 'bail|required|string',
            'image_product_2'   => 'bail|required|string',
            'image_product_3'   => 'bail|required|string',
            'price_product'     => 'bail|required|string',
            'desc_sort'         => 'bail|required|string',
            'created_by'        => 'bail|required|string',
            'updated_by'        => 'bail|required|string',
            'id_category'       => 'bail|required|integer',
        ]);
        if($validator->fails()){
            $arr = [
                'status' => false,
                'data' => $validator->errors()
            ];
            return response()->json($arr);
        }
        $product = $this->model->create($input);
        $this->message = 'Create Successfully !';
        $arr = [
            'status' => true,
            'message'   => $this->message,
            'data'   => new ProductResource($product)
        ];
        return response()->json($arr, 201);
    }
    public function update(Request $request, $productId): JsonResponse
    {
        $object = $this->model->find($productId);
        if($object){
            $input = $request->all();
            $validator = Validator::make($input, [
                'name_product'      => 'bail|required|string|unique:products,name_product,'.$productId.',id',
                'image_product'     => 'bail|required|string',
                'image_product_2'   => 'bail|required|string',
                'image_product_3'   => 'bail|required|string',
                'price_product'     => 'bail|required|string',
                'desc_sort'         => 'bail|required|string',
                'created_by'        => 'bail|required|string',
                'updated_by'        => 'bail|required|string',
                'id_category'       => 'bail|required|integer',
                'status'            => Rule::in(ProductStatusEnum::asArray())
            ]);
            if($validator->fails()){
                $arr = [
                    'status' => false,
                    'data' => $validator->errors()
                ];
                return response()->json($arr);
            }
            $object->name_product       = $input['name_product'];
            $object->image_product      = $input['image_product'];
            $object->image_product_2    = $input['image_product_2'];
            $object->image_product_3    = $input['image_product_3'];
            $object->price_product      = $input['price_product'];
            $object->desc_sort          = $input['desc_sort'];
            $object->desc               = $input['desc'];
            $object->created_by         = $input['created_by'];
            $object->updated_by         = $input['updated_by'];
            $object->status             = $input['status'];
            $object->id_category        = $input['id_category'];
            $object->save();
            $this->message = 'Update Successfully !';
            $arr = [
                'status'    => true,
                'message'   => $this->message,
                'data'      => new ProductResource($object)
            ];
        }
        else {
            $arr = [
                'status' => false,
                'message' => $this->message
            ];
        }
        return response()->json($arr);
    }
    public function destroy(Request $request, $productId){
        $object = $this->model->find($productId);
        if($object){
            $this->model->destroy($productId);
            $this->message = 'Delete Successfully !';
            $arr = [
                'status' => true,
                'message' =>  $this->message,
            ];
        }
        else {
            $arr = [
                'status' => false,
                'message' => $this->message
            ];
        }
        return response()->json($arr);
    }
}
