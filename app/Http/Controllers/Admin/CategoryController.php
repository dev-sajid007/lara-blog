<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;




class CategoryController extends Controller
{
    public function index(){

        return view('admin.category.index');
    }
    public function getData(){

        $categories = Category::latest()->get();
        return response()->json($categories);

    }
    public function store(REQUEST $request){

//        $img =$request->file('image');
//        if($img){
//            $imgName = date('YmsHi').$img->getClientOriginalName();
//            $img->move('public/images/',$imgName);
//            $category = new Category();
//            $category->image =$imgName;
//        }

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if(isset($image)){
            $date = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            $image->move('public/category',$imageName);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->image = $imageName;
        $category->save();


        return response()->json($category,200);


    }
}
