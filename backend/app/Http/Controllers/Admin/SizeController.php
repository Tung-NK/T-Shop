<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        return view('admin.size.index')->with([
            'sizes' => Size::latest()->get()
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
    public function store(AddSizeRequest $request)
    {
        if ($request->validated()) {
            Size::create($request->validated());
            return redirect()->route('admin.size.index')->with([
                'success' => 'Size has been added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit')->with([
            'size' => $size
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        if ($request->validated()) {
            $size->update($request->validated());
            return redirect()->route('admin.size.index')->with([
                'success' => 'Size has been updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('admin.size.index')->with([
            'success' => 'Size has been deleted successfully'
        ]);
    }

    public function trashed()
    {
        $sizes = Size::onlyTrashed()->get(); // Lấy danh sách đã xóa mềm
        return view('admin.size.trashed', compact('sizes'));
    }


    public function restore($id)
    {
        // Tìm bản ghi đã xóa mềm
        $size = Size::withTrashed()->findOrFail($id);
        $size->restore(); // Khôi phục
        return redirect()->route('admin.size.trashed')->with('success', 'Size restored successfully');
    }

    public function forceDelete($id)
    {
        // Tìm bản ghi đã xóa mềm
        $size = Size::withTrashed()->findOrFail($id);
        $size->forceDelete(); // Xóa vĩnh viễn
        return redirect()->route('admin.size.trashed')->with('success', 'Size permanently deleted');
    }
}
