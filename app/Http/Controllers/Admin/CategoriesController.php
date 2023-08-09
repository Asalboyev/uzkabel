<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'taken'=>'required',
            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/categories', $image_name);
            $requestData['images'] = $image_name;
        }

        $category = Category::create($requestData);
        return redirect()->route('admin.categories.index')->with('success', 'Category created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/categories', $image_name);

            // Eski rasimni o'chirib yuborish
            $old_image_name = $category->images;
            if ($old_image_name) {
                $old_image_path = 'site/images/categories/' . $old_image_name;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            // Yangi rasimni qo'shish
            $requestData['images'] = $image_name;
        } else {
            // Agar yangi rasim qo'shilmagan bo'lsa, eski rasimni qaytarib olamiz
            $requestData['images'] = $category->images;
        }

        $category->update($requestData);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $status = @unlink(public_path('site/images/categories/' . $category->images));
        if (!$status) {
            return redirect()->route('admin.categories.index')->with($category->images);
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('Success', "$category->name is deleted");
    }

}
