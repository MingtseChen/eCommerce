@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <a type="button" class="btn btn-success" href="{{route('product.create')}}">Add</a>
            </div>
            <br/>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Pic</th>
                                <th>price</th>
                                <th>auther</th>
                                <th>retailer</th>
                                {{--<th>desc</th>--}}
                                {{--<th>create time</th>--}}
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$book -> name}}</td>
                                    <td>
                                        <img src="{{asset($book -> pic_path)}}" width="50" height="80"/>
                                    </td>
                                    <td>{{$book -> price}}</td>
                                    <td>{{$book -> auther}}</td>
                                    <td>{{$book -> retailer}}</td>
                                    {{--<td>{{$book -> desc}}</td>--}}
                                    {{--<td>{{$book -> release_date}}</td>--}}
                                    <td>
                                        {{--<form method="POST" action="{{route('product.destroy',['id' => $book->id])}}">
                                            {{ method_field('DELETE') }}
                                            {{csrf_field()}}--}}
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                                data-target="#myModal{{$loop->iteration}}">
                                            <span>View</span>
                                        </button>
                                        {{--</form>--}}
                                    </td>
                                    <td>
                                        <form method="GET" action="{{route('product.edit',['id' => $book->id])}}">
                                            <button type="submit" class="btn btn-success btn-xs">
                                                <span>Edit</span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('product.destroy',['id' => $book->id])}}">
                                            {{ method_field('DELETE') }}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @foreach($books as $book)
        <!-- Modal -->
        <div class="modal fade" id="myModal{{$loop->iteration}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <div class="modal-body">
                            <div class="">
                                <label class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-8">
                                    <p>{{$book->name}}</p>
                                </div>
                                <label class="col-sm-4 control-label">Price</label>
                                <div class="col-sm-8">
                                    <p>{{$book->price}}</p>
                                </div>
                                <label class="col-sm-4 control-label">Releae Date</label>
                                <div class="col-sm-8">
                                    <p>{{$book->release_date}}</p>
                                </div>
                                <label class="col-sm-4 control-label">Author</label>
                                <div class="col-sm-8">
                                    <p>{{$book->auther}}</p>
                                </div>
                                <label class="col-sm-4 control-label">Description</label>
                                <div class="col-sm-8">
                                    <p>{{$book->desc}}</p>
                                </div>
                                <label class="col-sm-4 control-label">ISBN</label>
                                <div class="col-sm-8">
                                    <p>{{$book->ISBN}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
