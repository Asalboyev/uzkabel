<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());

        $request->validate([

            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $image_names = [];
            foreach ($files as $file) {
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('site/images/abouts'), $image_name);
                $image_names[] = $image_name;
            }
            $requestData['images'] = $image_names;
        }

        About::create($requestData);
        return redirect()->route('admin.abouts.index')->with('success', 'About created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $image_names = [];
            foreach ($files as $file) {
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('site/images/abouts'), $image_name);
                $image_names[] = $image_name;
            }
            $requestData['images'] = $image_names;

            // Delete the old images associated with the item
            $old_images = $about->images;
            foreach ($old_images as $old_image) {
                $old_image_path = public_path('site/images/abouts/' . $old_image);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
        } else {
            // If no new images uploaded, keep the existing images
            $requestData['images'] = $about->images;
        }
        $about->update($requestData);
        return redirect()->route('admin.abouts.index')->with('success', 'About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the Advantag item by its ID
        $about = About::findOrFail($id);

        // Delete the associated images from the disk
        $image_names = $about->images;
        foreach ($image_names as $image_name) {
            $image_path = public_path('site/images/abouts/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Delete the Advantag item
        $about->delete();

        return redirect()->route('admin.abouts.index')->with('success', 'About deleted successfully');
    }
    public function uploada(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->getClientOriginalName();
            // $fileName = pathinfo($originName, PATHINFO_FILENAME);
            // $extension = $request->file('upload')->getClientOriginalExtension();
            // $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('site/images/posts/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
