@extends('main')
<?php $titletag = htmlspecialchars($post->title); ?>
@section('title',"| $titletag")

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{$post->title}}</h1>
      <p>{!! $post->body !!}</p>
      <p>Posted In {{$post->category->name}}</p>
    </div>

  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3 class="comments-title"><svg-icon><src href="sprite.svg#si-glyph-bubble-message-dot" /></svg-icon>{{$post->comments()->count()}} Comments</h3>
      @foreach($post->comments as $comment)
        <div class="comment">
          <div class="author-info">
            <img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email)))}}" class="author-image" alt="">
            <div class="author-name">
            <h4>{{$comment->name}}</h4>
            <p class="author-time">{{date('F nS, Y - g:iA'.strtotime($comment->created_at))}}</p>
          </div>
          </div>
          <div class="comment-content">
            {{$comment->comment}}
          </div>

        </div>
      @endforeach
    </div>
  </div>

  <div class="row">
    <div class="comment-form" class="col-md-8 col-md-offset-2">
      {{Form::open(['route' => ['comments.store',$post->id],'method'=>'POST'])}}
      <div class="row">
        <div class="col-md-6">
          {{Form::label('name',"Name:")}}
          {{Form::text('name', null,['class'=>'form-control'])}}
        </div>
        <div class="col-md-6">
          {{Form::label('email',"Email:")}}
          {{Form::text('email', null,['class'=>'form-control'])}}
        </div>
        <div class="col-md-12">
          {{Form::label('comment',"Comment:")}}
          {{Form::textarea('comment', null,['class'=>'form-control','rows'=>'5'])}}<br>
          {{Form::submit('Add Comment',['class'=>'btn btn-success'])}}
        </div>
      </div>

      {{Form::close()}}

    </div>
  </div>

@endsection
