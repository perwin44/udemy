<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handleImage(Request $request){
        $request->validate([
            'image'=>'required|max:500|min:100|mimes:png,jpg,gif|image',//500KB,mimes=extensions
        ]);
        $request->image->storeAs('/images','new_image.jpg');

        return redirect()->route('success');
    }

    public function download(){
        return response()->download(public_path('/storage/images/new_image.jpg'));
    }
}
