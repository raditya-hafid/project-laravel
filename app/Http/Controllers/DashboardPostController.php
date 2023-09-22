<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index',
    [
        'posts'=>post::where('user_id',auth()->user()->id)->get()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories'=>category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData =$request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:posts',
            'category_id'=>'required',
            'image'=>'image|file|max:1024',
            'body'=>'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image']=$request->file('image')->store('post-image');
        }

        $validatedData['User_id']=auth()->user()->id;
        $validatedData['exe']=Str::limit(strip_tags($request->body), 80);

        post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'postingan baru sukses ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }

        return view('dashboard.posts.show' ,
    [
        'post' => $post
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }

        return view('dashboard.posts.edit',[
            'post'=>$post,
            'categories'=>category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $rules =[
            'title'=>'required|max:255',
            'category_id'=>'required',
            'image'=>'image|file|max:1024',
            'body'=>'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug']='required|unique:posts';
        }

        $validatedData=$request->validate($rules);

        if ($request->file('image')) {
            if ($post->image != null) Storage::delete($post->image);
            $validatedData['image']=$request->file('image')->store('post-image');
        }

        $validatedData['User_id']=auth()->user()->id;
        $validatedData['exe']=Str::limit(strip_tags($request->body), 80);

        post::where('id',$post->id)->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'postingan sukses diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        if ($post->image != null) Storage::delete($post->image);
        post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'postingan sukses dihapus!');
    }
//error
    // public function checkSlug(Request $request){ 
    //     $slug = SlugService::createSlug(post::class, 'slug', $request->title);
    //     return response()->json(['slug'=>$slug]);
    // }
}
