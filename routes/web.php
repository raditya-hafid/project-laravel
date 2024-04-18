<?php

use App\Models\User;
use App\Models\category;
use App\Http\Controllers\dash;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'post']);

Route::get('/about', function () {
    return view('about' , [
        "title" => "about",
        
        "nama" => "raditya" ,
        "no" => 24
        
    ]);
});


Route::get('/blog', [PostController::class, 'index']);

Route::get('/posts/{post:slug}' , [PostController::class, 'show']);

Route::get('/categories/', function(){
    return view('categories',[
        'judul'=>'Categories',
        'categories'=>category::all()
    ]);
});

Route::get('/authors/', function(){
    return view('authors',[
        'judul'=>'Authors',
        'authors'=>User::all()
    ]);
});

Route::get('/categories/{category:slug}', function(category $category){
    return view('category',[
        "judul" =>"Post by category: $category->name",
        "title" =>"Post by category: $category->name",
        "posts" => $category->posts->load(["category","author"]) ,
        "category"=>$category->name
    ]);
});

Route::get('authors/{user:username}', function(User $user){
    return view(
        'author',
        [
            'judul'=>'User',
          'title'=>'User',
          'posts'=>$user->posts->load('category','author'), //lazy eager di route model bainding😂
          'author'=>$user->name
        ]
    );
});

Route::get('/login', [login::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [login::class, 'login']);
Route::post('/logout', [login::class, 'logout']);

Route::get('/register', [login::class, 'register'])->middleware('guest');
Route::post('/register', [login::class, 'store']);

Route::get('/dash' , [dash::class,'de'])->middleware('auth');

// Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class, 'checkSlug'])->middleware('auth'); //error
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::get('/', [murid::class, 'login'] );