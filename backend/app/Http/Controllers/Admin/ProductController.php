<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index')->with([
            'products' => Product::with(['colors', 'sizes', 'category', 'brand'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.create')->with([
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        if ($request->validated()) {
            $data = $request->validated();
            $data['thumbnail'] = $this->saveImage($request->file('thumbnail'));
            //check if the admin send the first image
            if ($request->has('first_image')) {
                $data['first_image'] = $this->saveImage($request->file('first_image'));
            }
            //check if the admin send the second image
            if ($request->has('second_image')) {
                $data['second_image'] = $this->saveImage($request->file('second_image'));
            }
            //check if the admin send the third image
            if ($request->has('third_image')) {
                $data['third_image'] = $this->saveImage($request->file('third_image'));
            }
            $data['slug'] = Str::slug($request->name);
            $product = Product::create($data);
            //add product colors
            $product->colors()->sync($request->color_id);
            //add product sizes
            $product->sizes()->sync($request->size_id);
            return redirect()->route('admin.product.index')->with([
                'success' => 'Product has been added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.edit')->with([
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->validated()) {
            $data = $request->validated();
            if ($request->has('thumbnail')) {
                //remove the old thumbnail
                $this->removeProductImageFromStorage($product->thumbnail);
                //store the new thumbnail
                $data['thumbnail'] = $this->saveImage($request->file('thumbnail'));
            }
            //check if the admin send the first image
            if ($request->has('first_image')) {
                //remove the old first image
                $this->removeProductImageFromStorage($product->first_image);
                //store the new first image
                $data['first_image'] = $this->saveImage($request->file('first_image'));
            }
            //check if the admin send the second image
            if ($request->has('second_image')) {
                //remove the old second image
                $this->removeProductImageFromStorage($product->second_image);
                //store the new second image
                $data['second_image'] = $this->saveImage($request->file('second_image'));
            }
            //check if the admin send the third image
            if ($request->has('third_image')) {
                //remove the old third image
                $this->removeProductImageFromStorage($product->third_image);
                //store the new third image
                $data['third_image'] = $this->saveImage($request->file('third_image'));
            }
            $data['slug'] = Str::slug($request->name);
            $data['status'] = $request->status;
            $product->update($data);
            //add product colors
            $product->colors()->sync($request->color_id);
            //add product sizes
            $product->sizes()->sync($request->size_id);
            return redirect()->route('admin.product.index')->with([
                'success' => 'Product has been updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with([
            'success' => 'Product deleted successfully'
        ]);
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->get(); // Lấy danh sách đã xóa mềm
        return view('admin.product.trashed', compact('products'));
    }


    public function restore($slug)
    {
        $product = Product::withTrashed()->where('slug', $slug)->firstOrFail(); // Tìm bản ghi đã xóa mềm
        $product->restore(); // Khôi phục
        return redirect()->route('admin.product.index')->with('success', 'Product restored successfully');
    }

    public function forceDelete($slug)
    {
        $product = Product::withTrashed()->where('slug', $slug)->firstOrFail();
        $product->forceDelete();

        $this->removeProductImageFromStorage($product->thumbnail);
        $this->removeProductImageFromStorage($product->first_image);
        $this->removeProductImageFromStorage($product->second_image);
        $this->removeProductImageFromStorage($product->third_image);

        return redirect()->route('admin.product.trashed')->with('success', 'Product permanently deleted');
    }


    public function saveImage($file)
    {
        $image_name = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('images/products', $image_name, 'public');
        return 'storage/images/products/' . $image_name;
    }

    public function removeProductImageFromStorage($file)
    {
        $path = public_path($file);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
