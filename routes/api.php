<?php

use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    $users = User::with(['profile', 'posts'])->get();
    $usersResource = UserResource::collection($users);
    return response()->json($usersResource);
});

Route::get('/profiles', function () {
    $profiles = Profile::with(['user'])->get();
    $profilesResource = ProfileResource::collection($profiles);
    return response()->json($profilesResource);
});
