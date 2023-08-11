<?php

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/one-to-one', function () {
    // $user = User::create(['username' => 'John Doe']);
    // Profile::create([
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
    // $user = User::create(['username' => 'Tom Cruz']);
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
    // $user = User::create(['username' => 'Adam Smith']);
    // $profile = new Profile([
    //     'firstname' => 'Adam',
    //     'lastname' => 'Smith',
    //     'birthday' => '01-01-1999'
    // ]);

    // $profile->user()->associate($user)->save();
    // return response()->json([
    //     'username' => $profile->user->username,
    //     'firstname' => $profile->firstname,
    //     'lastname' => $profile->lastname,
    // ]);
});

Route::get('/one-to-many', function () {
    // $user = User::find(1);
    // Post::create([
    //     'user_id' => $user->id,
    //     'title' => 'Post title 1',
    //     'body' => 'Post body 1',
    // ]);
    // return response()->json([
    //     'username' => $user->username,
    //     'post' => $user->posts
    // ]);
    // =============================================
    // $user = User::find(2);
    // Post::insert(
    //     [
    //         [
    //             'user_id' => $user->id,
    //             'title' => 'Post title 2',
    //             'body' => 'Post body 2',
    //         ],
    //         [
    //             'user_id' => $user->id,
    //             'title' => 'Post title 3',
    //             'body' => 'Post body 3',
    //         ],
    //     ]
    // );
    // return response()->json([
    //     'username' => $user->username,
    //     'post' => $user->posts
    // ]);
    // =============================================
    // $user = User::find(3);
    // $user->posts()->create([
    //   'title' => 'Post title 4',
    //   'body' => 'Post body 4',
    // ]);
    // return response()->json([
    //     'username' => $user->username,
    //     'post' => $user->posts,
    // ]);
    // =============================================
    // $user = User::find(1);
    // $user->posts()->createMany([
    //     [
    //         'title' => 'Post title 5',
    //         'body' => 'Post body 5',
    //     ],
    //     [
    //         'title' => 'Post title 6',
    //         'body' => 'Post body 6',
    //     ]
    // ]);
    // return response()->json([
    //     'username' => $user->username,
    //     'post' => $user->posts,
    // ]);
    // =============================================
    // $user = User::find(2);
    // $post = new Post([
    //     'title' => 'Post title 7',
    //     'body' => 'Post body 7',
    // ]);

    // $post->user()->associate($user)->save();
    // return response()->json([
    //     'username' => $post->user->username,
    //     'title' => $post->title,
    //     'body' => $post->body,
    // ]);
});

Route::get('/users', function () {
    $users = User::with(['profile:id,firstname,lastname,user_id', 'posts:title,user_id'])->get();
    return view('users.list', compact('users'));
});

Route::get('/users/update', function () {
    // $user = User::with('profile')->find(1);
    // $user->username = 'John Doe Updated';
    // $user->profile->lastname = 'Doe Updated';
    // $user->push();
    // return response()->json($user);

    // $user = User::with('profile')->find(1);
    // $user->username = 'John Doe';
    // $user->save();
    // $user->profile->update([
    //     'lastname' => 'Doe'
    // ]);
    // return response()->json($user);
});

Route::get('/users/profile/delete', function () {
    $user = User::with('profile')->find(1);
    $user->profile()->delete();
    return response()->json($user);
});

Route::get('/profiles', function () {
    $profiles = Profile::with('user:username,id')->get();
    return view('profiles.list', compact('profiles'));
});

Route::get('/profiles/update', function () {
    // $profile = Profile::with('user')->find(1);
    // $profile->firstname = 'John Updated';
    // $profile->lastname = 'Doe Updated';
    // $profile->user->username = 'John Doe Updated';
    // $profile->push();
    // return response()->json($profile);

    // $profile = Profile::with('user')->find(1);
    // $profile->firstname = 'John';
    // $profile->lastname = 'Doe';
    // $profile->save();
    // $profile->user->update([
    //     'username' => 'Joun Doe'
    // ]);
    // return response()->json($profile);
});

Route::get('/profiles/user/delete', function () {
    // $profile = Profile::with('user')->findOrFail(2);
    // $profile->delete();
    // $profile->user()->delete();
});

Route::get('/posts', function () {
    $posts = Post::with('user:username,id', 'user.profile:firstname,lastname,user_id')->get();
    return view('posts.list', compact('posts'));
});
