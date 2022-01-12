<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

        $comments = Comment::latest()->get();

        return view('admin.post.comments',compact('comments'));
    }
    public function delete($id){
        Comment::find($id)->delete();
        return redirect()->back()->with('message','Delete Sucessfully');
    }
}
