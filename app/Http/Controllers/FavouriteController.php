<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function favourite_post($id){
        $user = Auth::user();
        $isFavourite = $user->favourite_to_post()->where('post_id',$id)->count();
        if ($isFavourite == 0){
            $user->favourite_to_post()->attach($id);

            $notification = array(
                'message' => 'Post add to favoirite list!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{

            $user->favourite_to_post()->detach($id);

            $notification = array(
                'message' => 'Post remove from favoirite list!',
                'alert-type' => 'warning',
                'closeButton ' => 'true'
            );
            return redirect()->back()->with($notification);
        }
    }
}
