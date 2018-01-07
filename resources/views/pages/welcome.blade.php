@extends('main')
@section('title','|Homepage')
  @section('stylesheets')

@endsection
  @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3">Welcome to my Blog</h1>

                    <p>Thank you for visiting.Please read my latest post</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- End of row -->
        <div class="row">
            <div class="col-md-8">
                <div class="post">
                    <h3> Post Title</h3>
                    <p>A lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site. A lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site.
                    </p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
                <hr class="my-4">
                <div class="post">
                    <h3> Post Title</h3>
                    <p>A lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site. A lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site.
                    </p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
                <hr class="my-4">
                <div class="post">
                    <h3> Post Title</h3>
                    <p>A lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site. A lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site.
                    </p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>

            </div>
            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>.

            </div>

        </div>
        <!-- End of row -->
    @endsection

@section('scripts')


@endsection
