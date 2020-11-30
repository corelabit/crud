<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function view()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        $title = $request->title;
        $details = $request->details;
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('Images'),$imageName);

        $image = new Image();
        $image->title = $title;
        $image->details = $details;
        $image->image = $imageName;
        $image->save();
        return back()->with("image_added","Record has been inserted");
    }

    public function show()
    {
        $images = Image::all();
        return view('post.show', compact('images'));
    }

    public function singleImg($id)
    {
        $image = Image::find($id);
        return view('post.view',compact('image'));
    }

    public function edit($id)
    {
        $image = Image::find($id);
        return view('post.edit',compact('image'));
    }
    
    public function update(Request $request)
    {
        $title = $request->title;
        $details = $request->details;
        $old_image = $request->old_image;
        $image = $request->file('image');

        $update = Image::find($request->id);
        if($request->has('image'))
        {
            unlink(public_path('images').'/'.$old_image);
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('Images'),$imageName);
            $update->image = $imageName;
        }
        $update->title = $title;
        $update->details = $details;
        $update->save();
        return back()->with("image_updated","Record has been updated");
    }
    
    function delete($id)
    {
        $image = Image::find($id);
        unlink(public_path('images').'/'.$image->image);
        $image->delete();
        return back()->with("image_delete","Record has been deleted");
    }

}
