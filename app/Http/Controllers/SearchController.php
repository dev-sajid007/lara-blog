<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');
        $posts = Post::where('title','LIKE',"%$query%")->get();
        return view('search_post',compact('posts','query'));

    }
}
