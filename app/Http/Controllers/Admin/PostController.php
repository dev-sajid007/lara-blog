<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('admin.post.index',compact('posts'));
    }

    public function create(){

        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('admin.post.create',compact('categories','tags'));
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
        $post->is_approved = true;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        return redirect()->route('admin.post.index')->with('message', 'Data Insert Successfully');
    }
    public function view($id){
        $post       = Post::find($id);
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('admin.post.view',compact('categories','tags','post'));
    }
    public function edit($id){

        $post       = Post::find($id);
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('admin.post.edit',compact('categories','tags','post'));
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

        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->update();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.post.index')->with('message', 'Data Update Successfully');
    }

    public function pending(){
        $posts = Post::where('is_approved',false)->latest()->get();
        return view('admin.post.pending',compact('posts'));
    }

    public function approved(Request $request,$id){
        $post = Post::find($id);
        $post->is_approved = true;
        $post->update();

        $posts = Post::latest()->get();
        return redirect()->route('admin.post.pending')->with('message', 'Post Approved Successfully');

    }
}
