<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
    return view('pages.contact');
  }
  public function postContact(Request $request){
    $this->validate($request,[
      'email'       =>  'required|email',
      'subject'        =>  'min:3',
      'message'        =>  'min:10'
    ]);
      $data = array(
        'email' => $request->email,
        'subject' => $request->subject,
        'bodymessage' => $request->message
      );
      Mail::send('emails.contact',$data,function($message) use ($data){
        $message-> from($data['email']);
        $message-> to($data['kusapkar@gmail.com']);
        $message-> subject($data['subject']);
      });
  }
}
