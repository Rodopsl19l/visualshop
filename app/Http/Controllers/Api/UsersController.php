<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function editUser(Request $request) {
        $data = [];
        $profileImagePath = 'public/img/profileImages';
        $coverImagePath = 'public/img/coverImages';

        $id = $request->input('id');

        $user = User::find($id);

        $profileImage = $request->file('profileImage');

        if($profileImage) {
            $previewProfileImagePath = $user['profile_photo_path'];

            $newProfileImageName = $this->generateRandomString().'.png';
            $newProfileImagePath = $request->file('profileImage')->storeAs($profileImagePath, $newProfileImageName);
            $newProfileImagePath = str_replace('public', 'storage', $newProfileImagePath);

            $user['profile_photo_path'] = $newProfileImagePath;

            if($previewProfileImagePath != null) {
                File::delete( public_path($previewProfileImagePath));
            }
        }

        $coverImage = $request->file('coverImage');

        if($coverImage) {
            $previewCoverImagePath = $user['cover_photo_path'];

            $newCoverImageName = $this->generateRandomString().'.png';
            $newCoverImagePath = $request->file('coverImage')->storeAs($coverImagePath, $newCoverImageName);
            $newCoverImagePath = str_replace('public', 'storage', $newCoverImagePath);

            $user['cover_photo_path'] = $newCoverImagePath;

            if($previewCoverImagePath != null) {
                File::delete( public_path($previewCoverImagePath));
            }
        }

        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        $phone = $request->input('phone');

        $user['name'] = $name;
        $user['lastname'] = $lastname;
        $user['email'] = $email;
        $user['username'] = $username;

        if($password != 'no') {
            $user['password'] = $password;
        }

        $user['phone'] = $phone;

        if($user->save()) {
            $data = [
                'code' => 200,
                'message' => 'Ok',
                'data' => 'Usuario actualizado correctamente',
            ];
        } else {
            $data = [
                'code' => 500,
                'message' => 'Error',
                'data' => 'Ocurrió un error al actualizar el usuario',
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
