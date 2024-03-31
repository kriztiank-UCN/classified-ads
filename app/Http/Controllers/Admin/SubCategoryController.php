<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditSubCategoryRequest;
use App\Http\Requests\StoreSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories = SubCategory::paginate(12);

        return view('admin.subcategories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subcategories');

            SubCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path
            ]);

            return redirect()->route('subcategories.index')->with('message', 'Sub Category created.');
        }
        dd('no image');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sub_category = SubCategory::find($id);
        return view('admin.subcategories.edit', compact('sub_category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(EditSubCategoryRequest $request, $id)
    {
        $sub_category = SubCategory::find($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subcategories');

            $sub_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path
            ]);
            return redirect()->route('subcategories.index')->with('message', 'Sub Category updated with image.');
        } else {
            $sub_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('subcategories.index')->with('message', 'Sub Category updated.');
        }
    }

    public function destroy($id)
    {
        $sub_category = SubCategory::find($id);

        $sub_category->delete();

        return redirect()->route('subcategories.index')->with('message', 'Sub Category deleted.');
    }
}
