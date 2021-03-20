<?php

use Illuminate\Support\Facades\Route;

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

Route::get('test', function () {
    $allposts = [
        ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Ali', 'created_at' => '2021-03-04'],
        ['id' => 2, 'title' => 'Java', 'posted_by' => 'Ahmed', 'created_at' => '2021-10-24'],
        ['id' => 3, 'title' => 'C#', 'posted_by' => 'Mahmoud', 'created_at' => '2021-08-14']
    ];
    return view('test',[
        'posts'=> $allposts
    ]);
});
