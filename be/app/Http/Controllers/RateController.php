<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use App\Http\Resources\RateResource;

class RateController extends Controller
{
    private Rate $model;
    private string $message;

    public function __construct()
    {
        $this->model = new Rate;
        $this->message = 'No Rate !';
    }

    public function index(){
        return RateResource::collection($this->model->all());
    }
}
