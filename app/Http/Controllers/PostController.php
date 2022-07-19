<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function userIndex()
    {
        return view('posts.profile');
    }

    public function userPosts()
    {
        $posts = DB::table('posts')->where('user_id','=',Auth::id())->get();
        $user_id = Auth::id();

        return response()->json([
            'posts' => $posts,
            'user_id' => $user_id
        ]);
    }

    /**
     * Show the listo for all tha posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $posts = Post::all();
        $user_id = Auth::id();
        return response()->json([
            'posts' => $posts,
            'user_id' => $user_id
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

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $has = false;
        if ($request->hasFile('image')) {
            $image = $this->saveImage($request);
            $has = true;
        }

        $post = Post::find($id);

        if ($has) {
            $post->image = $image;
        }
        $post->title = $request->title;
        $post->description = $request->description;

        $post->update();

        return response()->json([
            'updated' => true
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
        $post = Post::find($id);
        return view('posts.edit',['post'=>$post]);
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
