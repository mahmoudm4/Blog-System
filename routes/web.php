<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');  // For Update
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth'); // for Delete
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Auth::routes();


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    try {
        $user = Socialite::driver('github')->user();
        // dd($user);
        $finduser = User::where('github_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);

            return redirect()->route('posts.index');
        } else {
            $newUser = User::where('email', $user->email)->first();
            if ($newUser) {
                $newUser->github_id = $user->id;
                $newUser->save();
            } else {
                $newUser = User::create([
                    'name' => $user->name ? $user->name : $user->nickname,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'password' => encrypt('123456789'),
                ]);
            }
            Auth::login($newUser);
            return redirect()->route('posts.index');
        }
    } catch (Exception $e) {
        dd($e->getMessage());
    }
    
});

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});


Route::get('/auth/google/callback', function () {
    try {
        $user = Socialite::driver('google')->stateless()->user();
        // dd($user);
        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);
            
            return redirect()->route('posts.index');
        } else {
            $newUser = User::where('email', $user->email)->first();
            if ($newUser) {
                $newUser->github_id = $user->id;
                $newUser->save();
            } else {
                $newUser = User::create([
                    'name' => $user->name ? $user->name : $user->nickname,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456789'),
                ]);
            }
           

            Auth::login($newUser);

            return redirect()->route('posts.index');
        }
    } catch (Exception $e) {
        dd($e->getMessage());
    }


    
});