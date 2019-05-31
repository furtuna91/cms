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
use App\Post;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/about', function () {
//     // return view('welcome');
//     return "Hi about page";
// });
// Route::get('/contact', function () {
//     // return view('welcome');
//     return "Hi contact page";
// });

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return "This is the post number" . $id . ' ' . $name;
// });

// Route::get('admin/posts/example', array('as' => 'admin.home', function() {
//     $url = route('admin.home');
    
//     return 'this url is' . $url;
// }));

// Route::get('/post/{id}', 'PostsController@index');



// ------------------------------------------------------------------DB RAW QUERRIES

Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?,?)', ['blah blah', 'blah blah blah']);
});

// Route::get('/read', function(){
//     $results = DB::table('posts')->get();

//     dd($results);

//     // foreach ($results as $item) {
//     //     return $item->title;
//     // }
    
// });

Route::get('/update', function() {
    $updated = DB::table('posts')
        ->where('id', 1)
        ->update(['title' => 'PHP with laravel vs']);

    return $updated;
});

// Route::get('/delete', function() {
//     $deleted = DB::table('posts')->where('id', '=', 1)->delete();
//     return $deleted;
// });

// ------------------------------------------------------------------ELOQUENT
Route::get('/read', function() {
    $posts = Post::all();
    foreach ($posts as $post) {
        # code...
        return $post->title;
    }
});

Route::get('/findwhere', function() {
    $posts = Post::where('id', 1)->orderBy('id', 'desc')->get();
    return $posts;
});

Route::get('/findmore', function(){
    $posts = Post::findOrFail(1);
    return $posts;
});



Route::resource('posts', 'PostsController');
Route::get('/contact', 'PostsController@contact');
