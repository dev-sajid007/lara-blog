<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comments(REQUEST $request,$post){


        $comment = new Comment;
        $comment->post_id = $post;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;

        $comment->save();
        $notification = array(
            'message' => 'Comment Add Successfully!',
            'alert-type' => 'success',
            'closeButton ' => 'true'
        );

        return redirect()->back()->with($notification);

    }
}
