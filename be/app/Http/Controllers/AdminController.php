<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct(){
        $this->model = new Admin();
    }
    public function index(){
        return $this->model->all();
    }
}
