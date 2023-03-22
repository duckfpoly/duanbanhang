<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    private Blog $model;
    private string $message;

    public function __construct()
    {
        $this->model = new Blog;
        $this->message = 'No Item Blog !';
    }
    public function index(): AnonymousResourceCollection
    {
        return BlogResource::collection($this->model->all());
    }
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title_blog'    => 'bail|required|string|unique:App\Models\Blog,title_blog',
            'image_blog'    => 'bail|required|string',
            'content_blog'  => 'bail|required|string',
            'create_by'     => 'bail|required|string',
            'updated_by'    => 'bail|required|string',
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
            'data'   => new BlogResource($category)
        ];
        return response()->json($arr, 201);
    }
    public function show($blogId)
    {
        $object = $this->model->find($blogId);
        if($object){
            $arr = [
                'status' => true,
                'data'   => new BlogResource($object)
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
    public function update(Request $request, $blogId): JsonResponse
    {
        $object = $this->model->find($blogId);
        if($object){
            $input = $request->all();
            $validator = Validator::make($input, [
                'title_blog' => 'bail|required|string|unique:blogs,title_blog,'.$blogId.',id',
                'image_blog'    => 'bail|required|string',
                'content_blog'  => 'bail|required|string',
                'create_by'     => 'bail|required|string',
                'updated_by'    => 'bail|required|string',
            ]);
            if($validator->fails()){
                $arr = [
                    'status' => false,
                    'data' => $validator->errors()
                ];
                return response()->json($arr);
            }
            $object->title_blog = $input['title_blog'];
            $object->image_blog = $input['image_blog'];
            $object->content_blog = $input['content_blog'];
            $object->create_by = $input['create_by'];
            $object->updated_by = $input['updated_by'];
            $object->save();
            $arr = [
                'status' => true,
                'data' => new BlogResource($object)
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
    public function destroy(Request $request, $blogId){
        $object = $this->model->find($blogId);
        if($object){
            $this->model->destroy($blogId);
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
