<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
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
        $data = [];

        $follower = Follower::create($request->all());

        if($follower) {
            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => 'Ahora sigues a este usuario',
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Error al seguir al usuario',
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
        $data = [];

        $follower = Follower::find($id);

        if($follower->delete()) {
            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => 'Haz dejado de seguir a este usuario'
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Error al dejar de seguir a este usuario'
            ];
        }

        return response()->json($data);
    }

    public function findByFollower(Request $request) {
        $data = [];

        $user_id_follower = $request->input('user_id_follower');
        $user_id_following = $request->input('user_id_following');

        $follower = Follower::where('user_id_follower' , $user_id_follower)->where('user_id_following', $user_id_following)->get();

        if(sizeof($follower) != 0) {
            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => $follower,
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'No'
            ];
        }

        return response()->json($data);
    }

    public function getAllFollowing($id) {
        $data = [];

        $follower = Follower::where('user_id_follower', $id)->get();

        if(sizeof($follower) != 0) {
            $followerSizeOf = sizeof($follower);

            for($i = 0; $i < $followerSizeOf; $i++) {
                $userIdFollowing = $follower[$i]['user_id_following'];

                $user = User::find($userIdFollowing);

                $follower[$i]->user_following = $user;
            }

            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => $follower,
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'No'
            ];
        }

        return response()->json($data);
    }
}
