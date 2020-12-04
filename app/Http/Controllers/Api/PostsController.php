<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostVideo;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $posts = Post::all();

        if($posts) {
            foreach($posts as $post) {
                $postId = $post->id;

                $postImages = PostImage::where('post_id', $postId)->get();

                $post->post_images = $postImages;

                $postVideo = PostVideo::where('post_id', $postId)->get();

                $post->post_video = $postVideo;
            }

            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => [
                    'posts' => $posts,
                ],
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'No se encontro ningun usuario'
            ];
        }

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $imagePath = 'public/img/postImages';
        $videoPath = 'public/videos/postVideos';

        $post = new Post;

        $post['user_id'] = $request->input('user_id');
        $post['name'] = $request->input('name');
        $post['description'] = $request->input('description');
        $post['published'] = $request->input('published');

        try {
            if($post->save()) {
                $postImageOne = new PostImage;

                $postId = $post['id'];
                $imageOneName = $this->generateRandomString().'.png';
                $imageOneFinalPath = $request->file('imageOne')->storeAs($imagePath, $imageOneName);
                $imageOneFinalPath = str_replace('public', 'storage', $imageOneFinalPath);

                $postImageOne['post_id'] = $postId;
                $postImageOne['url'] = $imageOneFinalPath;

                if($postImageOne->save()) {
                    $postImageTwo = new PostImage();

                    $imageTwoName  = $this->generateRandomString().'.png';
                    $imageTwoFinalPath = $request->file('imageTwo')->storeAs($imagePath, $imageTwoName);
                    $imageTwoFinalPath = str_replace('public', 'storage', $imageTwoFinalPath);

                    $postImageTwo['post_id'] = $postId;
                    $postImageTwo['url'] = $imageTwoFinalPath;

                    if($postImageTwo->save()) {
                        $postImageThree = new PostImage();

                        $imageThreeName = $this->generateRandomString().'.png';
                        $imageThreeFinalPath = $request->file('imageThree')->storeAs($imagePath, $imageThreeName);
                        $imageThreeFinalPath = str_replace('public', 'storage', $imageThreeFinalPath);

                        $postImageThree['post_id'] = $postId;
                        $postImageThree['url'] = $imageThreeFinalPath;

                        if($postImageThree->save()) {
                            $postVideoOne = new PostVideo();

                            $videoOneName = $this->generateRandomString().".mp4";
                            $videoOneFinalPath = $request->file('videoOne')->storeAs($videoPath, $videoOneName);
                            $videoOneFinalPath = str_replace('public', 'storage', $videoOneFinalPath);

                            $postVideoOne['post_id'] = $postId;
                            $postVideoOne['url'] = $videoOneFinalPath;

                            if($postVideoOne->save()) {
                                $data = [
                                    'code' => 200,
                                    'message' => 'Ok',
                                    'data' => [
                                        'Post' => $post,
                                        'PostImageOne' => $postImageOne,
                                        'PostImageTwo' => $postImageTwo,
                                        'PostImageThree' => $postImageThree,
                                        'PostVideoOne' => $postVideoOne
                                    ],
                                ];
                            } else {
                                $data = [
                                    'code' => 500,
                                    'message' => 'Error',
                                    'data' => 'Ocurrió un error al crear el contenido',
                                ];
                            }
                        } else {
                            $data = [
                                'code' => 500,
                                'message' => 'Error',
                                'data' => 'Ocurrió un error al crear el contenido',
                            ];
                        }
                    } else {
                        $data = [
                            'code' => 500,
                            'message' => 'Error',
                            'data' => 'Ocurrió un error al crear el contenido',
                        ];
                    }
                } else {
                    $data = [
                        'code' => 500,
                        'message' => 'Error',
                        'data' => 'Ocurrió un error al crear el contenido',
                    ];
                }
            } else {
                $data = [
                    'code' => 500,
                    'message' => 'Error',
                    'data' => 'Ocurrió un error al crear el contenido',
                ];
            }
        } catch(\Exception $e) {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Ocurrió un error al crear el contenido',
            ];
        }

        return response()->json($data);
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

    public function getNewer() {
        $data = [];

        $posts = Post::where('published', '1')->orderByDesc('created_at')->limit(3)->get();

        if($posts) {
            foreach($posts as $post) {
                $postId = $post->id;

                $postImages = PostImage::where('post_id', $postId)->get();

                $post->post_images = $postImages;

                $postVideo = PostVideo::where('post_id', $postId)->get();

                $post->post_video = $postVideo;
            }

            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => [
                    'posts' => $posts,
                ],
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'No se encontro ningun usuario'
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
