<?php

namespace App\Http\Controllers;
use App\Post;
class PagesController extends Controller{

  public function getIndex(){
    $posts = Post::orderBy('created_at','desc')->limit(5)->get();
    return view('pages.welcome')->withPosts($posts);
  }
  public function getAbout(){
    $first = "Kunal";
    $last = "Usapkar";
    $full = $first ." ". $last;
    $email = "kun@gmail.com";
    $data = [];
    $data['email'] = $email;
    $data['full'] = $full;
    return view('pages/about')->withData($data);
  }
  public function getContact(){
    return view('pages/contact');
  }
  // public function postContact(){
  //
  // }
}
