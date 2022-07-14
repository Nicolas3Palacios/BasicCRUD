<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }



    /**
     * Show the listo for all tha posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $posts = Post::all();
        return response()->json([
            'posts' => $posts
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $this->saveImage($request);
        }
        $post = new Post($request->all());
        $post->image = $image;


        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $post->title,
            'description' => $post->description,
            'image' => $post->image,
        ]);

        return response()->json([
            'saved' => true,
            'post' => $post
        ]);
    }

    public function saveImage($request)
    {
        $key = md5(Auth::id());
        $path = "/image/posts" . $key . "/";

        $has = Str::random(20);

        $file = $request->file('image');
        $fileName = ($has . $file->getClientOriginalName());
        $file->move(public_path($path), $fileName);

        return ($path . $fileName);
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
        //
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
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json([
            'deleted' => true
        ]);
    }
}
