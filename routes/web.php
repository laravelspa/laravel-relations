<?php

use Illuminate\Support\Facades\Route;

Route::get('/one-to-one', function () {
    // $user = \App\Models\User::create(['username' => 'John Doe']);
    // \App\Models\Profile::create([
    //     'user_id' => $user->id,
    //     'firstname' => 'John',
    //     'lastname' => 'Doe',
    //     'birthday' => '08-11-1991'
    // ]);
    // return response()->json([
    //     'username' => $user->username,
    //     'firstname' => $user->profile->firstname,
    //     'lastname' => $user->profile->lastname,
    // ]);
    // =============================================
    // $user = \App\Models\User::create(['username' => 'Tom Cruz']);
    // $user->profile()->create([
    //   'firstname' => 'Tom',
    //   'lastname' => 'Cruz',
    //   'birthday' => '01-02-2000'
    // ]);
    // return response()->json([
    //     'username' => $user->username,
    //     'firstname' => $user->profile->firstname,
    //     'lastname' => $user->profile->lastname,
    // ]);
    // =============================================
    // $user = \App\Models\User::create(['username' => 'Adam Smith']);
    // $profile = new \App\Models\Profile([
    //     'firstname' => 'Adam',
    //     'lastname' => 'Smith',
    //     'birthday' => '01-01-1999'
    // ]);
    // ============================================
    // $profile->user()->associate($user);
    // $profile->save();
    // return response()->json([
    //     'username' => $profile->user->username,
    //     'firstname' => $profile->firstname,
    //     'lastname' => $profile->lastname,
    // ]);
});

Route::get('/users', function () {
    // $users = \App\Models\User::all();
    $users = \App\Models\User::with('profile')->get();
    return view('users.oneToOne', compact('users'));
});

Route::get('/profiles', function () {
    // $profiles = \App\Models\Profile::all();
    $profiles = \App\Models\Profile::with('user')->get();
    return view('profiles.oneToOne', compact('profiles'));
});
