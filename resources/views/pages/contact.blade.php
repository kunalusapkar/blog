@extends('main')
@section('title','|Contact Us')
@section('content')
        <div class="row">
          <div class="col-md-12">
            <h1>Contact Us</h1>
            <form action="{{ url('contact')}}" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" name="email" class="form-control">

            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
              <input id="subject" name="subject" class="form-control">

            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" class="form-control"  placeholder=""></textarea>

            </div>
            <!-- <input type="submit" value="Send Message" name="submit" class="btn btn-success" > -->
          </form>
          </div>
        </div>
    @endsection
