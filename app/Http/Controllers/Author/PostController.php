<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Brian2694\Toastr\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts()->latest()->get();
        return view('author.post.index',compact('posts'));
    }

    public function create(){

        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('author.post.create',compact('categories','tags'));
    }

    public function store(REQUEST $request)
    {

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $date . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move('public/post', $imageName);
        } else {
            $imageName = 'default.png';
        }
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        return redirect()->route('author.post.index')->with('message', 'Data Insert Successfully');
    }

    public function view($id){

        $post       = Post::find($id);
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();

        if($post->user_id != Auth::user()->id){

            return back()->with('message', 'Data Update Successfully');

        }

        return view('author.post.view',compact('categories','tags','post'));
    }

    public function edit($id){


        $post       = Post::find($id);
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        if($post->user_id != Auth::user()->id){

            return back()->with('message', 'Data Update Successfully');

        }
        return view('author.post.edit',compact('categories','tags','post'));
    }

    public function update(REQUEST $request,$id){

        $image = $request->file('image');
        $slug = str_slug($request->title);
        $post = Post::find($id);
        if (isset($image)) {
            $date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $date . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('public/post', $imageName);

            if(file_exists('public/post/'.$post->image) AND !empty($post->image))
            {
                unlink('public/post/'.$post->image);
            }

        } else {
            $imageName = $post->image;
        }


        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->update();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        if($post->user_id != Auth::user()->id){

            return back()->with('message', 'You Have No Access');

        }

        return redirect()->route('author.post.index')->with('message', 'Data Update Successfully');
    }
}
