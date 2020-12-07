<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostVideosController extends Controller
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
        //
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

    public function editVideo(Request $request) {
        $data = [];
        $videoPath = 'public/videos/postVideos';

        $id = $request->input('id');

        $postVideo = PostVideo::find($id);

        $previewVideoPath = $postVideo['url'];

        $newVideoName = $this->generateRandomString().'.mp4';
        $newVideoFinalPath = $request->file('video')->storeAs($videoPath, $newVideoName);
        $newVideoFinalPath = str_replace('public', 'storage', $newVideoFinalPath);

        $postVideo['url'] = $newVideoFinalPath;

        if($postVideo->save()) {
            File::delete( public_path($previewVideoPath));

            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => 'Video actualizado correctamente',
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Ocurrió un error al actualizar el video',
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
