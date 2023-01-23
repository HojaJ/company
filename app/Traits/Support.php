<?php


namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Support
{
    public static function storeImage($image){
        if (!file_exists('images')) {
            File::makeDirectory('images', 0777, true, true);
        }
        $extension = $image->getClientOriginalExtension();
        $imageName = Str::random(10).'.'.$extension;
        $image->move(public_path('images'), $imageName);
        return 'images/'. $imageName;
    }
}
