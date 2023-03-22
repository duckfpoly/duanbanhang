<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private Cart $cart;
    private User $model;
    private string $message;

    public function __construct()
    {
        $this->model = new User();
        $this->cart = new Cart();
        $this->message = 'User not found !';
    }

    public function index(){
        return UserResource::collection($this->model->paginate());
    }

    public function information(): JsonResponse
    {
        $user = Auth::guard('user')->user();
        return response()->json([
            'status'=> true,
            'data' => $user
        ] );
    }

    public function changeInfomation(Request $request){
        $user = Auth::guard('user')->user();
        $object = $this->model->find($user->id);
        if($object){
            $input = $request->all();
            $validator = Validator::make($input, [
                'fullname' => 'bail|required|string',
                'email' => 'bail|required|string|unique:users,email,'.$user->id.',id',
                'phone' => 'bail|required|string|unique:users,phone,'.$user->id.',id',
                'address' => 'bail|required|string',
            ]);
            if($validator->fails()){
                $arr = [
                    'status' => false,
                    'data' => $validator->errors()
                ];
                return response()->json($arr);
            }
            $object->fullname = $input['fullname'];
            $object->email = $input['email'];
            $object->phone = $input['phone'];
            $object->address = $input['address'];
            $object->status = $input['status'];
            $object->save();
            $arr = [
                'status' => true,
                'message' => 'Update category successfully !',
                'data' => new UserResource($object)
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

    public function changePassword(Request $request) {
        $user = Auth::guard('user')->user();
        $object = $this->model->find($user->id);
        if($object){
            $validator = Validator::make($request->all(), [
                'old_password' => 'required|string|min:6',
                'new_password' => 'required|string|confirmed|min:6',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            else {
                $object->new_password = $request->all()['new_password'];
                $object->save();
                return response()->json([
                    'message' => 'User successfully changed password',
                    'user' => $user,
                ], 201);
            }
        }
        else {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ]);
        }

    }


}
