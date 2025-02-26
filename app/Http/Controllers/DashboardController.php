<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::all(),
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }
}
