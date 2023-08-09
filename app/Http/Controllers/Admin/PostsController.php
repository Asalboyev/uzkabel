<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('taken','post')->get();
        return view('admin.posts.create',compact('categories'));
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
            $file->move('site/images/posts', $image_name);
            $requestData['images'] = $image_name;
        }

        Post::create($requestData);
        return redirect()->route('admin.posts.index')->with('success', 'Post created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::where('taken','post')->get();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
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
            $file->move('site/images/posts', $image_name);
            // Eski rasimni o'chirib yuborish
            $old_image_name = $post->images;
            if ($old_image_name) {
                $old_image_path = 'site/images/posts/' . $old_image_name;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            // Yangi rasimni qo'shish
            $requestData['images'] = $image_name;
        } else {
            // Agar yangi rasim qo'shilmagan bo'lsa, eski rasimni qaytarib olamiz
            $requestData['images'] = $post->images;
        }

        $post->update($requestData);
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $status = @unlink(public_path('site/images/posts/' . $post->images));
        if (!$status) {
            return redirect()->route('admin.posts.index')->with($post->images);
        }

        $post->delete();
        return redirect()->route('admin.posts.index')->with('Success', "$post->name is deleted");
    }
    public function upload(Request $request)
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

