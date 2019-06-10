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
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;

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
//     DB::insert('insert into countries(title, content) values(?,?)', ['blah blah', 'blah blah blah']);
// });

// Route::get('/read', function(){
//     $results = DB::table('posts')->get();

//     dd($results);

//     // foreach ($results as $item) {
//     //     return $item->title;
//     // }
    
// });

// Route::get('/update', function() {
//     $updated = DB::table('posts')
//         ->where('id', 1)
//         ->update(['title' => 'PHP with laravel vs']);

//     return $updated;
// });

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


// Route::get('/basicinsert', function() {
//     $post = new Post;
//     $post->title = 'New Eloquent title insert';
//     $post->content = 'Wow..whatafacaiaio';
//     $post->save();
// });

Route::get('/create', function() {
    Post::create([
        'title' => 'the created method',
        'content' => 'wow...i am creating'
    ]);
    // Country::create(
    //     [
    //         'name' => 'Bulgaria',
    //     ]
    // );
    // User::create(
    //     [
    //         'country_id' => '0',
    //         'name' => 'Cornea',
    //         'email' => 'blahblagh',
    //         'password' => '123',
    //     ]
    // );
});

// Route::get('/update', function() {
//     Post::where('id', 1)->where('is_admin', 0)->update(['title' => 'new php title', 'content'=> 'i love blah blah']);
// });


// Route::get('/delete', function() {
//     $post = Post::find(1);
//     $post->delete();
// });
Route::get('/delete2', function() {
    // Post::destroy([3,4]);
    Post::where('is_admin', 0)->delete();
});

Route::get('/softdelete', function() {
    Post::find(5)->delete();
});

Route::get('/readsoftdelete', function() {

    // $post = Post::find(5);
    // $post = Post::withTrashed()->where('id', 5)->get();
    $post = Post::onlyTrashed()->where('is_admin', 0)->get();

    return $post;
});

Route::get('/restore', function() {
    
    Post::withTrashed()->where('is_admin', 0)->restore();
    // return $post;
});

Route::get('/forcedelete', function() {

    Post::withTrashed()->where('is_admin', 0)->forceDelete();
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});


/*
|--------------------------------------------------------------------------
| ELOQUENT RELATIONSHIPS
|--------------------------------------------------------------------------
*/
// ------------------------------------------------------------------ONE TO ONE
Route::get('/user/{id}/post', function($id) {
    return User::find($id)->post;
});

Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user;
});


// ------------------------------------------------------------------ONE TO MANY
Route::get('/posts', function() {
    $user = User::find(1);
    
    foreach ($user->posts as $post) {
        # code...
        echo $post . '<br>';
    }
});


// ------------------------------------------------------------------MANY TO MANY
Route::get('/user/{id}/role', function($id) {
    $user = User::find($id)->roles;
    return $user;
});

// ------------------------------------------------------------------HAS MANY
Route::get('/user/country', function() {
    $country = Country::find(2);

    foreach ($country->posts as $post) {
        # code...
        echo $post->title;
    }
});


/*
|--------------------------------------------------------------------------
| POLYMORPHIC RELATIONSHIPS
|--------------------------------------------------------------------------
*/
Route::get('/user/photos', function() {
    $user = User::find(1);
    foreach ($user->photos as $photo) {
        # code...
        return $photo;
    }
});

Route::get('/post/photos', function() {
    $post = Post::find(1);
    foreach ($post->photos as $photo) {
        # code...
        dd($photo);
    }
});


Route::get('/photo/{id}/post', function($id) {
    $photo = Photo::findOrFail($id);

    return $photo->imageable;
    // $post = Post::find(1);
    // foreach ($post->photos as $photo) {
    //     # code...
    //     dd($photo);
    // }
});
// ------------------------------------------------------------------POLYMORPHIC MANY TO MANY
Route::get('/post/tag', function() {
    $post = Post::find(1);

    foreach ($post->tags as $tag) {
        # code...
        dd($tag);
    }
});

// Route::get('/tag/post', function() {
//     $tag = Tag::findOrFail(2);
//     return $tag->posts;

//     // dd($tag);
//     // foreach ($tag->posts as $post) {
//     //     # code...
//     //     dd($post);
//     // }
// });


/*
|--------------------------------------------------------------------------
| CRUD APPLICATION
|--------------------------------------------------------------------------
*/

// Route::resource('/posts', 'PostsController')
Route::resource('posts', 'PostsController');


Route::get('/contact', 'PostsController@contact');
