<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
{
    $categories = Category::with('products')->get();

    return Inertia::render('Home', [
        'categories' => $categories,
    ]);
}
}