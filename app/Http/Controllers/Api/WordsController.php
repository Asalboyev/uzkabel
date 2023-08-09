<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnValue;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words =Word::all();
        return view('admin.words.index',compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.words.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'key' => "required",
            'name_uz' => "required",
            'name_ru' => "required",
            'name_en' => "required",
        ]);
        $requestData = $request->all();

        Word::create($requestData);
        return redirect()->route('admin.words.index')->with('success','Word created successfully!');
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
    public function edit(Word $word)
    {
        return view('admin.words.edit',compact('word'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Word $word)
    {
        $this->validate($request,[
            'key' => "required",
            'name_uz' => "required",
            'name_en' => "required",
            'name_ru' => "required",
        ]);
        $requestData = $request->all();
        $word->update($requestData);
        return redirect()->route('admin.words.index')->with('success','Word updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Word::destroy($id);
        return redirect()->route('admin.words.index')->with('success','Word Delet successfully!');

    }
    public function word(Request $request)
    {
        if($request->hasFile('upload')) {
            $fileName = $request->file('upload')->getClientOriginalName();
            // $fileName = pathinfo($originName, PATHINFO_FILENAME);
            // $extension = $request->file('upload')->getClientOriginalExtension();
            // $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('site/images/words/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
