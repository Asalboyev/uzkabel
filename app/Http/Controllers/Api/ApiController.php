<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Advantag;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Post;
use App\Models\Product;
use App\Models\Word;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getposts(Request $request)
    {
        try {
            $posts = Post::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$posts,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }

    public function getcategories(Request $request)
    {
        try {
            $categories = Category::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$categories ,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function getprocuts(Request $request)
    {
        try {
            $products = Product::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$products,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function getabout(Request $request)
    {
        try {
            $about = About::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$about,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function getadvantag(Request $request)
    {
        try {
            $about = Advantag::all();
            return response()->json([
                'ok'=>true,
                'posts'=>$about,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function getlogo(Request $request)
{
    try {
        $about = Logo::all();
        return response()->json([
            'ok'=>true,
            'posts'=>$about,
        ]);
    }
    catch (\Exception $e){
        return  response()->json([
            'ok'=>false,
            'mag'=>$e->getMessage(),
        ]);
    }
}
    public function uz(Request $request)
    {
        try {
            $about = Word::select('key', 'name_uz')->get();
            return response()->json([
                'ok'=>true,
                'lang'=>$about,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function ru(Request $request)
    {
        try {
            $about = Logo::select('key', 'name_ru')->get();
            return response()->json([
                'ok'=>true,
                'lang'=>$about,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
    public function en(Request $request)
    {
        try {
            $about = Word::select('key', 'name_en')->get();
            return response()->json([
                'ok'=>true,
                'lang'=>$about,
            ]);
        }
        catch (\Exception $e){
            return  response()->json([
                'ok'=>false,
                'mag'=>$e->getMessage(),
            ]);
        }
    }
}
