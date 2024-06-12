<?php

use Illuminate\Support\Facades\Route; // Add this line to import the Route class
use App\Post; // Add this line to import the Post class
use Illuminate\Support\Facades\Auth;

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

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/read',function(){  
    $posts=Post::all();  
    foreach($posts as $post)  
    {  
      echo $post->body;  
    //   echo ?<br>?;  
    }  
    });
    Route::get('/find',function(){  
        $posts=Post::where('id',1)->first();  
        return $posts;  
        });   
        
        Route::get('/insert',function(){  
            $post=new Post;  
            $post->title='Nishka';  
            $post->body='QA Analyst';  
            $post->save();  
            });  
            Route::get('/basicupdate',function(){  
                $post=Post::find(1);  
                $post->title='Haseena';  
                $post->body='Graphic Designer';  
                $post->save();  
                });  