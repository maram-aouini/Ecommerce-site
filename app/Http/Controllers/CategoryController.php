<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->with('products')
            ->firstOrFail();

        return Inertia::render('Category/Show', [
            'category' => $category
        ]);
    }
}