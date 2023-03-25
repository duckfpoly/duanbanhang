<?php

namespace App\Http\Controllers;

use App\Enums\CategoryStatusEnum;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    private string $message;
    private Category $model;

    public function __construct()
    {
        $this->model = new Category();
        $this->message = 'No category !';
    }
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection($this->model->paginate(1));
    }
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name_category' => 'bail|required|string|unique:App\Models\Category,name_category',
        ]);
        if($validator->fails()){
            $arr = [
                'status' => false,
                'data' => $validator->errors()
            ];
            return response()->json($arr);
        }
        $category = $this->model->create($input);
        $arr = [
            'status' => true,
            'message' => 'Create category successfully !',
            'data'   => new CategoryResource($category)
        ];
        return response()->json($arr, 201);
    }
    public function show($categoryId)
    {
        $object = $this->model->find($categoryId);
        if($object){
            $arr = [
                'status' => true,
                'message' => 'Category Detail',
                'data'   => new CategoryResource($object)
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
    public function update(Request $request, $categoryId): JsonResponse
    {
        $object = $this->model->find($categoryId);
        if($object){
            $input = $request->all();
            $validator = Validator::make($input, [
                'name_category' => 'bail|required|string|unique:categories,name_category,'.$categoryId.',id',
                'status'        => Rule::in(CategoryStatusEnum::asArray())
            ]);
            if($validator->fails()){
                $arr = [
                    'status' => false,
                    'data' => $validator->errors()
                ];
                return response()->json($arr);
            }
            $object->name_category = $input['name_category'];
            $object->status = $input['status'];
            $object->save();
            $arr = [
                'status' => true,
                'message' => 'Update category successfully !',
                'data' => new CategoryResource($object)
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
    public function destroy(Request $request, $categoryId){
        $object = $this->model->find($categoryId);
        if($object){
            $this->model->destroy($categoryId);
            $this->message = 'Delete Category Successfully !';
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
