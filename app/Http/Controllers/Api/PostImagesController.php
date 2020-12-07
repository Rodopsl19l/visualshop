<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request;

        $data = [];
        $imagePath = 'public/img/postImages';

        $postImage = PostImage::find($id);

        $previewImagePath = $postImage['url'];

        $newImageName = $this->generateRandomString().'.png';
        $newImageFinalPath = $request->file('image')->storeAs($imagePath, $newImageName);
        $newImageFinalPath = str_replace('public', 'storage', $newImageFinalPath);

        $postImage['url'] = $newImageFinalPath;

        if($postImage->save()) {
            File::delete( public_path($previewImagePath));

            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => 'Imagen actualizada correctamente',
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Ocurrió un error al actualizar la imagen',
            ];
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editImage(Request $request) {
        $data = [];
        $imagePath = 'public/img/postImages';

        $id = $request->input('id');

        $postImage = PostImage::find($id);

        $previewImagePath = $postImage['url'];

        $newImageName = $this->generateRandomString().'.png';
        $newImageFinalPath = $request->file('image')->storeAs($imagePath, $newImageName);
        $newImageFinalPath = str_replace('public', 'storage', $newImageFinalPath);

        $postImage['url'] = $newImageFinalPath;

        if($postImage->save()) {
            File::delete( public_path($previewImagePath));

            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => 'Imagen actualizada correctamente',
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Ocurrió un error al actualizar la imagen',
            ];
        }

        return response()->json($data);
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
