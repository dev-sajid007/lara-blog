<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(){

        return view('admin.tag.index');
    }

    public function getData(){

        $tags = Tag::latest()->get();
        return response()->json($tags);

    }

    public function store(REQUEST $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags|max:255|min:2'
        ]);
        if ($validator->fails()) {
            return response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        return response()->json($tag);
    }

    public function edit($id){

        $tag = Tag::find($id);
        return response()->json($tag);
    }

    public function update(REQUEST $request,$id){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|min:2'
        ]);
        if ($validator->fails()) {
            return response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        return response()->json($tag);
    }

    public function delete($id){

        $tag = Tag::find($id)->delete();
        return response()->json($tag);
    }
}
