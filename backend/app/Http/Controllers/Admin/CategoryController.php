<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index')->with([
            'categories' => Category::latest()->get(),
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
    public function store(AddCategoryRequest $request)
    {
        if ($request->validated()) {
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            Category::create($data);
            return redirect()->route('admin.category.index')->with([
                'success' => 'Category added successfully',
            ]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit')->with([
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($request->validated()) {
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            $category->update($data);
            return redirect()->route('admin.category.index')->with([
                'success' => 'Category updated successfully',
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with([
            'success' => 'Category deleted successfully',
        ]);
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->get(); // Lấy danh sách đã xóa mềm
        return view('admin.category.trashed', compact('categories'));
    }


    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->firstOrFail(); // Tìm bản ghi đã xóa mềm
        $category->restore(); // Khôi phục
        return redirect()->route('admin.category.index')->with('success', 'Category restored successfully');
    }

    public function forceDelete($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->firstOrFail();
        $category->forceDelete();
        return redirect()->route('admin.category.trashed')->with('success', 'Category permanently deleted');
    }
}
