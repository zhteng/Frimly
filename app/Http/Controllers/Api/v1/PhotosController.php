<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Photo as PhotoResource;
use App\Models\Api\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PhotosController extends Controller
{

    public function index(Request $request)
    {
        return $request;
    }

    /*public function show(Photo $photos):PhotosResource
    {
        return new PhotosResource($photos);

        //return Photo::find($photos);
        //$Show = Photo::where(['id' => $photos, 'title' => "$title"])->first();

        //return $Show;
    }*/

    public function show(Photo $photo): PhotoResource
    {
        return new PhotoResource($photo);
    }


}