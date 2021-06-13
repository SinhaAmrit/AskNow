<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\RepliesController;
use App\Models\Discussion;
use Illuminate\Support\Facades\Route;
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

// Home Page
Route::view('/', 'home');

Route::group(['prefix' => 'discussions', 'as' => 'discussions.', ], function() {
	Route::resource('/', DiscussionController::class);
	Route::resource('/{discussion}/replies', RepliesController::class);
	Route::post('/{discussion}/replies/{reply}/mark-as-best-reply', [DiscussionController::class, 'reply'])->name('mark-as-best');
	Route::get('/{discusion:slug}', function (Discussion $discusion) {
		return view('discussion.show', ['discussion' => $discusion]);
	});
});
Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => 'is_admin'], function() {
	    //
});
Route::group(['prefix' => 'dev', 'as' => 'dev', 'middleware' => 'is_dev'], function() {
	    //
});