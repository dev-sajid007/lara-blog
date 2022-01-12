<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){

        $users = User::Authors()
            ->withCount('posts')
            ->withCount('comments')
            ->withCount('favourite_to_post')
            ->get();
        return view('admin.author.index',compact('users'));

    }
    public function delete($id){
        User::find($id)->delete();
        return redirect()->back();
    }
}
