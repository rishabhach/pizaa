<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

//    public function __construct()
//    {
//        $this->middleware('Admin')->except('show');
////        $this->middleware('UserMiddleware',['only'=>['show']]);
////        public function __construct()
////    {
////        $this->middleware('guest')->except('logout');
////    }
//    }

    public function __construct()
    {
        $this->middleware('Admin',['except'=>['show','home']]);
        $this->middleware('UserMiddleware',['only'=>['show']]);
    }
    public function index()
    {
        $posts = post::all();

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        post::create($request->all());
        return redirect()->route('post.index')->with('success','pizza post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('post.show',compact('post'));
        //return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {


//        return "i am in update post";
        $post = post::find($id);

        $post->update($request->all());

        return redirect()->route('post.index')->with('success','record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('success','user deleted succesfully');

    }

    public function home()
    {

        $posts = post::all();
        return view('home',compact('posts'));

    }
}
