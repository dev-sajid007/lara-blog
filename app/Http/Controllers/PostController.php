<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        $categories = Category::all();
        return view('welcome',compact('categories','posts'));
    }

    public function details($slug){

        $post = Post::where('slug',$slug)->first();

        $blogKey = 'blog_'.$post->id;
        if (!Session::has($blogKey)){

                $post->increment('view_count');
                Session::put($blogKey,2);
        }
        $randPosts = Post::all()->random(3);
        return view('post',compact('post','randPosts'));
    }

    public function category($slug){

        $category = Category::where('slug',$slug)->first();
        return view('category_post',compact('category'));
    }

    public function tag($slug){

        $tag = Tag::where('slug',$slug)->first();
        return view('tag_post',compact('tag'));
    }
}
