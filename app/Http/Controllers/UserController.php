<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserPostRequest;

class UserController extends Controller
{
    public function userData($user, $request, $isUpdate = false){
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->birth_date = $request->birth_date;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        $user->mobile = $request->mobile;
        if($isUpdate){

        }
        else{
            $user->email = $request->email;
            $user->password = $request->password;
        }
        if($request->image){
            $user->image = $request->image;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all();
       return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UserPostRequest $request)
    {
        $request->password = Hash::make($request->password);

        if($request->image){
            $request->image =  uploadPhotos($request->image, 'images/users/');
        }

        $user = new User();
        $this->userData($user, $request);

        $user->save();
        $token = $user->createToken('ACCESS TOKEN')->accessToken;;

        return response(['user' =>$user, 'access_token' => $token]);
    }

    public function changeProfilePhoto(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $request->image =  uploadPhotos($request->image, 'images/users/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
