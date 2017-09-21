@extends('layouts.shopping')

@section('content')

    <div class="container">

        <div class="row">
            {{--@include('partial.menu')--}}


            <div class="col-md-12">

                {{--<div class="row carousel-holder">--}}

                {{--<div class="col-md-12">--}}
                {{--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}
                {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="1"></li>--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="2"></li>--}}
                {{--</ol>--}}
                {{--<div class="carousel-inner">--}}
                {{--<div class="item active">--}}
                {{--<img class="slide-image" src="http://placehold.it/800x300" alt="">--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<img class="slide-image" src="http://placehold.it/800x300" alt="">--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<img class="slide-image" src="http://placehold.it/800x300" alt="">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">--}}
                {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
                {{--</a>--}}
                {{--<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">--}}
                {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

                <div class="row">
                    @foreach($books as $book)
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="{{$book -> pic_path}}" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">${{$book->price}}</h4>
                                    <h4><a href="#">{{$book->name}}</a></h4>
                                    <p>{{$book->desc}}
                                        <button href="#" class="btn btn-primary" role="button">Button</button>
                                    </p>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
@endsection
