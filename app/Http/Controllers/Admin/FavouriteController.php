<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index(){
        $posts = Auth::user()->favourite_to_post->where('user_id',Auth::user()->id);
        //dd($posts);
        return view('admin.post.favourite',compact('posts'));
    }
}
