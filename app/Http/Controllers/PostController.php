<?php

namespace App\Http\Controllers;
use App\Models\post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(){
        return view('home',[
            "title"=>"Home"
        ]);
    }

    public function index(){
        
        return view('posts',[
            "title"=>"All Post",
            
            "posts"=>post::latest()->filter()->paginate(6), //eager loding tambahkan = with()
            
        ]);
    }

    public function show(post $post){
        return view('post',[
            "title"=>"post",
            "pos"=>$post
        ]);
        
    }


}


