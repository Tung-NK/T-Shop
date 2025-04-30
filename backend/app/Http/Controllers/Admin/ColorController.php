<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.color.index')->with([
            'colors' => Color::latest()->get()
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
    public function store(AddColorRequest $request)
    {
        if ($request->validated()) {
            Color::create($request->validated());
            return redirect()->route('admin.color.index')->with([
                'success' => 'Color has been added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit')->with([
            'color' => $color
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        if ($request->validated()) {
            $color->update($request->validated());
            return redirect()->route('admin.color.index')->with([
                'success' => 'Color has been updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('admin.color.index')->with([
            'success' => 'Color has been deleted successfully'
        ]);
    }

    public function trashed()
    {
        $colors = Color::onlyTrashed()->get(); // Lấy danh sách đã xóa mềm
        return view('admin.color.trashed', compact('colors'));
    }


    public function restore($id)
    {
        // Tìm bản ghi đã xóa mềm
        $color = Color::withTrashed()->findOrFail($id);
        $color->restore(); // Khôi phục
        return redirect()->route('admin.color.trashed')->with('success', 'Color restored successfully');
    }

    public function forceDelete($id)
    {
        // Tìm bản ghi đã xóa mềm
        $color = Color::withTrashed()->findOrFail($id);
        $color->forceDelete(); // Xóa vĩnh viễn
        return redirect()->route('admin.color.trashed')->with('success', 'Color permanently deleted');
    }
}
