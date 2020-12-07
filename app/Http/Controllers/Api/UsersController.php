<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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

        $user = User::create($request->all());

        if($user) {
            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => $user,
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
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

        $user = User::find($id);

        $userTypeId = $user->user_type_id;

        $userType = UserType::find($userTypeId);

        $user->user_type = $userType;

        if($user) {
            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => [
                    'user' => $user
                ],
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'No se encontro usuario con el id: ' .$id,
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

    public function login(Request $request) {
        $data = [];

        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if($user) {
            $password = $request->input('password');

            if($password == $user->password) {
                $data = [
                    'code' => 200,
                    'message' => 'Ok',
                    'data' => $user,
                ];
            } else {
                $data = [
                    'code' => 403,
                    'message' => 'Error',
                    'data' => 'Contraseña incorrecta',
                ];
            }
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'No se encontro ningun usuario con ese correo',
            ];
        }

        return response()->json($data);
    }
}
