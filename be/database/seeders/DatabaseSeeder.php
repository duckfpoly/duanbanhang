<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Rate;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(5)->create();
        Product::factory(5)->create();
        User::factory(5)->create();
        Blog::factory(5)->create();
        Cart::factory(5)->create();
        Order::factory(5)->create();
        Rate::factory(5)->create();
    }
}
