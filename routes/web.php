<?php

use Illuminate\Support\Facades\Route; // Add this line to import the Route class
use App\Post; // Add this line to import the Post class
use Illuminate\Support\Facades\Auth;
use App\User;

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

Route::get('/user',function()  
{  
  return User::find(1)->post;  
}  
);  

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

                Route::get('/create',function(){  
                    Post::create(['title'=>'Vraj','body'=>'Technical Content Writer','user_id'=>2]);  
                    });  

                    Route::get('/update',function(){  
                        Post::where('id',1)->update(['title'=>'Charu','body'=>'technical Content Writer']);  
                        });  

                        Route::get('/delete',function(){  
                            $post=Post::find(1);  
                            $post->delete();  
                            });  

                            Route::get('/destroy',function(){  
                                Post::destroy([3,4]);  
                                });  

                                Route::get('/delete1',function(){  
                                    Post::where('id',5)->delete();  
                                    });  