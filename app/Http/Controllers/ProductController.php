<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the products based on a unique authenticated user
     */
    public function index(): View
    {
        //? fetch products for the authenticated user
        $products = Product::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        //  dd($products->toArray());

        //? return the view with products
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //? Check if the authenticated user can edit the product
        if (Gate::denies('can-edit-product', $product)) {
            abort(403, 'You do not have permission to edit this product.');
        }

        //? return the view with the product to edit
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
