<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    	$this->middleware('admin');
    }

    public function index()
    {
    	$posts=Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=new Post();
        if ($request->hasFile('image')) {
        	$image=$request->image;
        	$path='files/images/';
        	$img_name=time().'.'.$image->getClientOriginalExtension();
        	$post->image='/files/images/'.$img_name;
        	$image->move($path, $img_name);
        }

        $post->title_uz=$request->title_uz;
        $post->title_ru=$request->title_ru;
        $post->title_en=$request->title_en;
        $post->desc_uz=$request->desc_uz;
        $post->desc_ru=$request->desc_ru;
        $post->desc_en=$request->desc_en;
        $post->body_en=$request->body_en;
        $post->body_ru=$request->body_ru;
        $post->body_uz=$request->body_uz;
        $post->status=$request->status;
        $post->abiturient=$request->abi;
        $post->user_id=Auth::user()->id;
        $post->save();
        return redirect()->route('posts.index')->with('flash', 'post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$post=Post::FindOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::FindOrFail($id);
        if ($request->hasFile('new_image')) {
            $image=$request->new_image;
            $path='files/images/';
            $img_name=time().'.'.$image->getClientOriginalExtension();
            $image->move($path, $img_name);
            $post->image='/files/images/'.$img_name;
        }else{
            $post->image=$request->image;
        }
        
        $post->title_uz=$request->title_uz;
        $post->title_ru=$request->title_ru;
        $post->title_en=$request->title_en;
        $post->desc_uz=$request->desc_uz;
        $post->desc_ru=$request->desc_ru;
        $post->desc_en=$request->desc_en;
        $post->body_en=$request->body_en;
        $post->body_ru=$request->body_ru;
        $post->body_uz=$request->body_uz;
        $post->status=$request->status;
        $post->user_id=Auth::user()->id;
        $post->update();
        return redirect()->route('posts.index')->with('flash', 'post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return back()->with('flash', 'post deleted successfully');
    }
}
