<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct(){
       $this->middleware('auth');
     }
    public function index()
    {
      // creata a variable and store all the blog posts in it from the database
      $posts = Post::orderBy('id','desc')->paginate(5);
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
      $categories = Category::all();
      $tags = Tag::all();
      return view('posts.create')->withCategories($categories)->withTags($tags);
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
        'title'       =>  'required|max:255',
        'slug'        =>  'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'category_id' => 'required|integer',
        'body'        =>  'required',
        'featured_image' => 'sometimes|image'
              ));
      // Store the database
      $post = new Post;
      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = Purifier::clean($request->body);
      // save our image

      if ($request->hasFile('featured_image')) {
          $image = $request->file('featured_image');
          $filename = time().'.'.$image->getClientOriginalExtension();
          $location = public_path('images/'.$filename);
          Image::make($image)->resize(800,400)->save($location);
          $post->image = $filename;
        }





      $post->save();
      $post->tags()->sync($request->tags, false);
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
        $categories = Category::all();
        $tags = Tag::all();
        $tagsarray = array();
        $cats = array();
        foreach ($categories as $category) {
          $cats[$category->id] = $category->name;
        }
        foreach ($tags as $tag) {
            $tagsarray[$tag->id] = $tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tagsarray);
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
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
          $this->validate($request,array(
            'title'=>'required|max:255',
              'body'=>'required',
              'featured_image' => 'image'
                  ));

        }
        else {
          $this->validate($request,array(
            'title'=>'required|max:255',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'body'=>'required'
                  ));
        }

        //Save the data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->input('body'));
        if ($request->hasFile('featured_image')) {
            // add the new photo
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldfilename = $post->image;
            //update the database
            $post->image = $filename;
            // delete the photo
            Storage::delete($oldfilename);
          }
        $post->save();

        $post->tags()->sync($request->tags);
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
        $post->tags()->detach();
        $post->delete();
        Session::flash('success','Post successfully deleted!');
        return redirect()->route('posts.index');
    }
}
