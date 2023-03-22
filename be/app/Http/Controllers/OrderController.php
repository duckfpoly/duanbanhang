<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    private Order $model;

    public function __construct()
    {
        $this->model = new Order;
    }
    public function index(): AnonymousResourceCollection
    {
        return OrderResource::collection($this->model->all());
    }
}
