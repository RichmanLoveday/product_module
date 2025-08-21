<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreationRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProductController extends Controller
{
    //? Using the FileUploadTrait for handling file uploads
    use FileUploadTrait;

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
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreationRequest $request)
    {
        //? get the image path using the uploadImage method from the FileUploadTrait
        $imagePath = $this->uploadImage($request, 'image', '/uploads/products');

        //? Create a new product with validated data
        Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        //? Redirect back to the products index with success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        //? Check if the authenticated user can edit the product
        if (Gate::denies('can-edit-product', $product)) {
            abort(403, 'You do not have permission to edit this product.');
        }

        //? return the view with the product to edit
        return view('product.edit', compact('product'));
    }


    /**
     * Update the specified product in database.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        //? Check if the authenticated user can edit the product
        if (Gate::denies('can-edit-product', $product)) {
            abort(403, 'You do not have permission to edit this product.');
        }

        // dd($request->file, $product->toArray());

        //? get the image path using the uploadImage method from the FileUploadTrait
        $imagePath = $this->uploadImage($request, 'image', '/uploads/products', $product->image);

        //? Update the product with validated data
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath ?? $product->image, //? Use old image if no new image is uploaded
            'price' => $request->price,
        ]);

        //? Redirect back to the products index with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //? Check if the authenticated user can delete the product
        if (Gate::denies('can-delete-product', $product)) {
            abort(403, 'You do not have permission to delete this product.');
        }

        //? Remove the product image from storage
        $this->removeImage($product->image);

        //? Delete the product from database
        $product->delete();

        //? Redirect back to the products index with success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}