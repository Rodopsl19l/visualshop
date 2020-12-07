<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostVideo;
use App\Models\User;
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
                'data' => 'No se encontro contenido'
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
        $data = [];

        $post = Post::find($id);

        if($post) {
            $postId = $post->id;

            $postImages = PostImage::where('post_id', $postId)->get();

            $post->post_images = $postImages;

            $postVideo = PostVideo::where('post_id', $postId)->get();

            $post->post_video = $postVideo;

            $postUserId = $post->user_id;

            $postUser = User::where('id', $postUserId)->get();

            $post->user = $postUser;

            $comments = Comment::where('post_id', $postId)->get();

            $commentsLength = sizeof($comments);

            for($i = 0; $i < $commentsLength; $i++) {
                $userComment = $comments[$i]->user_id;

                $user = User::find($userComment);

                $comments[$i]->user = $user;
            }

            $post->comments = $comments;

            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => [
                    'post' => $post,
                ],
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'No se encontro el contenido con el id: ' . $id,
            ];
        }

        return response()->json($data);
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
        $data = [];

        $post = Post::find($id);

        $name = $request->input('name');
        $description = $request->input('description');
        $published = $request->input('published');

        $post['name'] = $name;
        $post['description'] = $description;
        $post['published'] = $published;

        if($post->update()){
            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => 'Post editado correctamente',
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Ocurrió un error al editar el contenido'
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

    public function getNewer() {
        $data = [];

        $posts = Post::where('published', '1')->orderByDesc('updated_at')->limit(3)->get();

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
