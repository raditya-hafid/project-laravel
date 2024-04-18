<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;

use App\Models\category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(){
        return view('home',[
            "title"=>"Home"
        ]);
    }

    public function index(){

        $title='';
        if (request('category')) {
            $category = category::firstWhere('slug', request('category'));
            $title = ' a ' . $category->slug;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' ' .  $author->name;
        }
        
        return view('posts',[
            "title"=>"All Photo" . $title,
            
            "posts"=>post::latest()->filter(request(['Cari', 'category', 'author']))->paginate(6), //eager loding tambahkan = with()
            
        ]);
    }

    public function show(post $post){
        return view('post',[
            "title"=>"post",
            "pos"=>$post
        ]);
        
    }


}


