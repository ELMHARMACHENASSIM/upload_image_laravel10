<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller{
    public function store(Request $request)
    {
        request()->validate([
            'imageupload' => "required|image|mimes:jpeg,jpg,svg,jfif,png,gif|max:8192",
        ]);
        
        $imageName = time() . '.' . $request->file('imageupload')->getClientOriginalExtension();
        $request->file('imageupload')->move(public_path('imagesfile'), $imageName);
      
        $data = [
            'imageupload' => $imageName,
        ];

        Image::create($data);
      
        return redirect()->back();
    }
}
