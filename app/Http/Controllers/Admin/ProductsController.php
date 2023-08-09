<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('taken','product')->get();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/products', $image_name);
            $requestData['images'] = $image_name;
        }

        Product::create($requestData);
        return redirect()->route('admin.products.index')->with('success', 'Product created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/products', $image_name);
            // Eski rasimni o'chirib yuborish
            $old_image_name = $product->images;
            if ($old_image_name) {
                $old_image_path = 'site/images/products/' . $old_image_name;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            // Yangi rasimni qo'shish
            $requestData['images'] = $image_name;
        } else {
            // Agar yangi rasim qo'shilmagan bo'lsa, eski rasimni qaytarib olamiz
            $requestData['images'] = $product->images;
        }

        $product->update($requestData);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $status = @unlink(public_path('site/images/products/' . $product->images));
        if (!$status) {
            return redirect()->route('admin.products.index')->with($product->images);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('Success', "$product->name is deleted");
    }
    public function uploade(Request $request)
    {
        if($request->hasFile('upload')) {
            $fileName = $request->file('upload')->getClientOriginalName();
            // $fileName = pathinfo($originName, PATHINFO_FILENAME);
            // $extension = $request->file('upload')->getClientOriginalExtension();
            // $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('site/images/posts/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
