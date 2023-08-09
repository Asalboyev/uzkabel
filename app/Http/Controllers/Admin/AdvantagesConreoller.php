<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantag;
use Illuminate\Http\Request;
use mysql_xdevapi\CollectionModify;

class AdvantagesConreoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advantags = Advantag::all();
        return view('admin.advantags.index', compact('advantags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advantags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
                $file->move(public_path('site/images/advantags'), $image_name);
                $image_names[] = $image_name;
            }
            $requestData['images'] = $image_names;
        }
        Advantag::create($requestData);
        return redirect()->route('admin.advantags.index')->with('success', 'Advantag created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advantag $advantag)
    {
        return view('admin.advantags.show', compact('advantag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advantag $advantag)
    {
        return view('admin.advantags.edit', compact('advantag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advantag $advantag)
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
                $file->move(public_path('site/images/advantags'), $image_name);
                $image_names[] = $image_name;
            }
            $requestData['images'] = $image_names;

            // Delete the old images associated with the item
            $old_images = $advantag->images;
            foreach ($old_images as $old_image) {
                $old_image_path = public_path('site/images/advantags/' . $old_image);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
        } else {
            // If no new images uploaded, keep the existing images
            $requestData['images'] = $advantag->images;
        }
        $advantag->update($requestData);
        return redirect()->route('admin.advantags.index')->with('success', 'Advantag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the Advantag item by its ID
        $advantag = Advantag::findOrFail($id);

        // Delete the associated images from the disk
        $image_names = $advantag->images;
        foreach ($image_names as $image_name) {
            $image_path = public_path('site/images/advantags/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Delete the Advantag item
        $advantag->delete();

        return redirect()->route('admin.advantags.index')->with('success', 'Advantag deleted successfully');
    }
    public function uploadad(Request $request)
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
