<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // creata a variable and store all the blog posts in it from the database
      $posts = Post::all();
      // return a view and pass in the above variable
      return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validate the database
      $this->validate($request,array(
        'title'=>'required|max:255',
        'body'=>'required'
              ));
      // Store the database
      $post = new Post;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      Session::flash('success','Post successfully saved!');
      return redirect()->route('posts.show', $post->id);
      // redirect to other page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save in the variable
        $post = Post::find($id);
        return view('posts.edit')->withPost($post);
        // return the view and pass in the var we previously created
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
        //Validate the data
        $this->validate($request,array(
          'title'=>'required|max:255',
          'body'=>'required'
                ));
        //Save the data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        // Set flash data with success message
        Session::flash('success','Post successfully updated!');
        //redirect with flash data to post.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Post successfully deleted!');
        return redirect()->route('posts.index');
    }
}
