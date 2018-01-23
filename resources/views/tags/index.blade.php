@extends('main')

@section('title', '| All Tags')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>Category</h1>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
          <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- end of col-md-8  -->
    <div class="col-md-3">
      <div class="well">
      {!!Form::open(['route' =>'tags.store','method'=>'POST'])!!}
      <h2>New Tags</h2>
       {{ Form::label('name','Name:')}}
       {{ Form::text('name',null,['class'=>'form-control'])}}<br>
       {{ Form::submit('Create New Tags',['class'=>'btn btn-primary'])}}
      {!!Form::close()!!}
      </div>
    </div>
  </div>


@endsection
