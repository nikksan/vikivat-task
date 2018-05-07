<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;
use Auth;
use Config;

class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $images = Image::where('approved', true)->get();

        return view('pages.home', ['images' => $images]);
    }

    public function showImage($image_id){
        $image = Image::where([
            'id' => $image_id,
            'approved' => true
        ])->firstOrFail();
        
        return view('pages.image', ['image' => $image]);
    }

    public function deleteImage($image_id){
        $image = Image::where('id', $image_id)->firstOrFail();
        $image->delete();

         // Delete the file from storage
        Storage::delete($image->filename);

        return redirect()->to('/image/mine')->with('success', 'You succesfully deleted the image, you can now upload a new one.');
    }

    public function showUploadForm(){
        return view('pages.upload'); 
    }

    public function handleImageUpload(Request $request){
        if(!$request->hasFile('image')){
            return redirect()->back()->with('error', 'You need to supply a valid image file');
        }

        $file = $request->file('image');

        if($file->getClientSize() > Config::get('constants.max_upload_size')){
            return redirect()->back('error', 'Max filesize increased, your file must be smaller than ' . bytesToHuman(Config::get('constants.max_upload_size')) );
        }


        $filename = $file->store('public/uploads');

        // Save to db
        $image = new Image();
        $image->filename = $filename;
        $image->user_id = Auth::id();        
        $image->saveOrFail();

        return redirect()->back()->with('success', 'Your image is uploaded and is waiting for approvement');
    }

    public function showUserUploads(){
        $images = Image::where(['approved' => true, 'user_id' => Auth::id() ])->get();

        return view('pages.gallery', ['images' => $images]);   
    }

}
