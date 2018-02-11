@extends('main')

@section('title', "| Edit Tag")

@section('content')

<div class="row">
  <div class="col-md-3">
    <div class="well">
    {{Form::model($tag,['route' =>['tags.update',$tag->id],'method'=>"PUT"])}}
    <h2>New Tags</h2>
     {{ Form::label('name',"Title:")}}
     {{ Form::text('name',null,['class'=>'form-control'])}}<br>
     {{ Form::submit('Save Changes',['class'=>'btn btn-primary'])}}
    {{Form::close()}}
    </div>
  </div>
</div>


@endsection
