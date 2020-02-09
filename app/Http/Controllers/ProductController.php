<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function store()
    {
        $product = new Product;
        $product->title = "Magic Mouse";
        $product->price = 119;
        $product->save();

        $category = new Category;

        // One category only
        /*
        $cat = $category->find(1); // Category model
        $product->categories()->attach($cat);
        */

        // Multiple categories
        $cats = $category->find([1, 2]);
        //$cats = $category->whereIn('title', ['Apple', 'Alienware'])->get();
        $product->categories()->attach($cats);
    }

    public function update(Product $product)
    {
        //dd($product);

        // Add a product in a category
        /*
        $category = new Category;
        $cat = $category->find(1); // Apple
        $product->categories()->attach($cat);
        */

        // Remove a product of a category
        /*
        $category = new Category;
        $cat = $category->find(1); // Apple
        $product->categories()->detach($cat);
        */
    }

}
