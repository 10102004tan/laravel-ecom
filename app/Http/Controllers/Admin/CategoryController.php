<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ],
        [
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
            'status.required' => 'Status is required'
        ]
        );
        //upload file image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $image_name);
            $validated['image'] = $image_name;
        }
        $validated['slug'] = Str::slug($request->name);
        Category::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.category.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {   
        if (File::exists(public_path('uploads/category/' . $category->image))) {
            File::delete(public_path('uploads/category/' . $category->image));
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category delete successfully');
    }
}
