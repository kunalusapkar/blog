@extends('main')
@section('title','| Forgot my Password')
@section('content')

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Reset Password</h3>
      </div>
      <div class="panel-body">
        {!! Form::open(['url'=>'password/email', 'method'=>"POST"]) !!}
        {{ Form::label('email','Email Address:') }}
        {{ Form::email('email',null,['class'=>'form-control']) }}
        {{ Form::submit('Reset Password',['class'=>'btn btn-primary'])}}
        {{Form::close()}}
        </div>
      <div class="panel-footer">

      </div>
    </div>
  </div>
</div>


@endsection
