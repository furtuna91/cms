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
// Route::get('/insert', function(){
//     DB::insert('insert into posts(title, content) values(?,?)', ['PHP with laravel', 'Laravel is the best thing that has happened to php']);
// });

Route::get('/read', function(){
    $results = DB::table('posts')->get();

    dd($results);

    // foreach ($results as $item) {
    //     return $item->title;
    // }
    
});



Route::resource('posts', 'PostsController');
Route::get('/contact', 'PostsController@contact');
