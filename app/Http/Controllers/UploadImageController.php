<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    //
    public function store(Request $request){
        $file = $request->file('file');
        $path = $file->store('pictures');
        return response()->json(['location'=>$path]);
    }
}
