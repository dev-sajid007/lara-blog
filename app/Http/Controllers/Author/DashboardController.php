<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user  = Auth::user();
        $posts = $user->posts;
        $posts;
        $populer_posts = $user->posts()
            ->withCount('comments')
            ->withCount('favourite_to_user')
            ->orderBy('view_count','desc')
            ->orderBy('favourite_to_user_count')
            ->take(5)->get();
        $total_pending_posts = $posts->where('is_approved',false)->count();
        $all_view = $posts->sum('view_count');
        return view('author.dashboard',compact('posts','populer_posts','total_pending_posts','all_view'));
    }
}
