<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        //dd($category);
        $products = $category->products()->orderBy('created_at', 'DESC')->paginate(1);
        return view('category.show', compact('category', 'products'));
    }

    public function update(Category $category)
    {
        //dd($category);
        // Remove somoe products of a category
        /*
        $product = new Product;
        $p = $product->find([1,2]);
        $category->products()->detach($p);
        $category->products()->attach($p);
        */

        $category->products()->sync([4,5]); // No duplicate
    }
}
