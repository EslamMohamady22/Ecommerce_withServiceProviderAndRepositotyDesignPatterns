<?php 
namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class imageUpload {
    public static function uploadImage($request , $path = null)
    {
            $imageName = Str::uuid().time().'.'. $request->extension();
            // Storage::disk('images')->put($path.$imageName, $request->logo->path());
            $request->move(public_path($path),$imageName);
            return $path.$imageName;
    }
}