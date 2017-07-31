<?php

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



// Users 

Auth::routes();

// Posts route('posts.index')

Route::get('posts', 'PostController@index')->name('posts.index');

Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::post('posts', 'PostController@store')->name('post.store');

Route::get('posts/{post_id}/edit', 'PostController@edit')->name('post.edit');

Route::patch('posts/{post_id}', 'PostController@update')->name('post.update');

Route::delete('posts/{post_id}', 'PostController@destroy')->name('post.destroy');

Route::get('posts/{post_id}', 'PostController@show')->name('post.show');



// Comments
Route::post('/comments','CommentController@store')->name('comments.store');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'api','middleware' => 'auth'], function(){
    Route::get('find', function(Illuminate\Http\Request $request){
        $keyword = $request->input('keyword');
        Log::info($keyword);
        $tags = DB::table('taggs')->where('name','like','%'.$keyword.'%')
                  ->select('taggs.id','tags.field','tags.post_id')
                  ->get();
        return json_encode($tags);
    })->name('api.tags');
});