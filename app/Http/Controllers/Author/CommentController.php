<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){

        $comments = Comment::where('user_id',Auth::user()->id)->get();
        return view('author.post.comments',compact('comments'));
    }
    public function delete($id){

        Comment::find($id)->delete();
        return redirect()->back()->with('message','Delete Sucessfully');
    }
}
