<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index')->with([
            'brands' => Brand::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBrandRequest $request)
    {
        if ($request->validated()) {
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            Brand::create($data);
            return redirect()->route('admin.brand.index')->with([
                'success' => 'Brand added successfully',
            ]);
        };
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(Brand $brand)
    {
        abort(404);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit')->with([
            'brand' => $brand,
        ]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if ($request->validated()) {
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            $brand->update($data);
            return redirect()->route('admin.brand.index')->with([
                'success' => 'Brand updated successfully',
            ]);
        };
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brand.index')->with([
            'success' => 'Brand deleted successfully',
        ]);
    }

    public function trashed()
    {
        $brands = Brand::onlyTrashed()->get(); // Lấy danh sách đã xóa mềm
        return view('admin.brand.trashed', compact('brands'));
    }


    public function restore($slug)
    {
        $brand = Brand::withTrashed()->where('slug', $slug)->firstOrFail(); // Tìm bản ghi đã xóa mềm
        $brand->restore(); // Khôi phục
        return redirect()->route('admin.brand.index')->with('success', 'Brand restored successfully');
    }

    public function forceDelete($slug)
    {
        $brand = Brand::withTrashed()->where('slug', $slug)->firstOrFail();
        $brand->forceDelete();
        return redirect()->route('admin.brand.trashed')->with('success', 'Brand permanently deleted');
    }
}
