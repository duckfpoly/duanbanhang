<?php
//
//use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\Request;
//
//Route::get('image',function(){
//    //        http://localhost:8000/storage/images/RSinmNXDwAi60WL6NYms9gxbyQheJyrqNgFo4NER.jpg
////        ;
//});
//Route::post('images', function (Request $request) {
//    if ($request->hasFile('image-product') && $request->file('image-product')->isValid()) {
//        $image = $request->file('image-product');
////        dd($image->path());
//        $path = $image->store('public/images');
//        $url = Storage::url($path);
//        return response()->json([
//            'url' => $url,
////            'image'=> $image->path()
//        ]);
//    } else {
//        return response()->json(['error' => 'Invalid file'], 400);
//    }
//});
