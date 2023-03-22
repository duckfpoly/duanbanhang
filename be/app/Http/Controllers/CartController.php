<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    private Cart $model;

    public function __construct()
    {
        $this->model = new Cart();
        $this->message = 'No item !';
    }
    public function index(): AnonymousResourceCollection
    {
        return CartResource::collection($this->model->all());
    }
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_user'       => 'required',
            'id_product'    => 'required',
            'image_product' => 'required',
            'price_product' => 'required',
            'quantity'      => 'required',
            'toping'        => 'required',
        ]);
        if($validator->fails()){
            $arr = [
                'status' => false,
                'data' => $validator->errors()
            ];
            return response()->json($arr);
        }
        $cart = $this->model->create($input);
        $arr = [
            'status' => true,
            'data'   => new CartResource($cart)
        ];
        return response()->json($arr, 201);
    }
    public function update(Request $request, $cartId): JsonResponse
    {
        $object = $this->model->find($cartId);
        if($object){
            $input = $request->all();
            $validator = Validator::make($input, [
                'quantity' => 'required',
            ]);
            if($validator->fails()){
                $arr = [
                    'success' => false,
                    'data' => $validator->errors()
                ];
                return response()->json($arr);
            }
            $object->quantity = $input['quantity'];
            $object->save();
            $arr = [
                'status' => true,
                'data' => new CartResource($object)
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
    public function destroy(Request $request, $cartId){
        $object = $this->model->find($cartId);
        if($object){
            $this->model->destroy($cartId);
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
