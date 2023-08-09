<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos = Logo::all();
        return view('admin.logos.index',compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'taken_id' => 'required',
            'link' => 'required',

        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $image_names = [];
            foreach ($files as $file) {
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('site/images/logos'), $image_name);
                $image_names[] = $image_name;
            }
            $requestData['images'] = $image_names;
        }
        Logo::create($requestData);
        return redirect()->route('admin.logos.index')->with('success', 'Logo created succuessfuly');
    }
    /**
     * Display the specified resource.
     */
    public function show(Logo $logo)
    {
        return view('admin.logos.show',compact('logo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logo $logo)
    {
        return view('admin.logos.edit',compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'taken_id' => 'required',
            'link' => 'required',

        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $image_names = [];
            foreach ($files as $file) {
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('site/images/logos'), $image_name);
                $image_names[] = $image_name;
            }
            $requestData['images'] = $image_names;

            // Delete the old images associated with the item
            $old_images = $logo->images;
            foreach ($old_images as $old_image) {
                $old_image_path = public_path('site/images/logos/' . $old_image);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
        } else {
            // If no new images uploaded, keep the existing images
            $requestData['images'] = $logo->images;
        }
        $logo->update($requestData);
        return redirect()->route('admin.logos.index')->with('success', 'Logo updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logo = Logo::findOrFail($id);

        // Delete the associated images from the disk
        $image_names = $logo->images;
        foreach ($image_names as $image_name) {
            $image_path = public_path('site/images/logos/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Delete the Advantag item
        $logo->delete();

        return redirect()->route('admin.logos.index')->with('success', 'Logo deleted successfully');
    }
}
