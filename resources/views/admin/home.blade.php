@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <a type="button" class="btn btn-success" href="#">Add</a>
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
                                <th>username</th>
                                <th>email</th>
                                <th>create time</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data -> name}}</td>
                                    <td>{{$data -> name}}</td>
                                    <td>{{$data -> email}}</td>
                                    <td>{{$data -> create_at}}</td>
                                    <td>Edit</td>
                                    <td>
                                        <form method="POST" action="{{route('admin.destroy',['id' => $data->id])}}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <button type="submit" class="btn btn-danger btn-group-xs">
                                                <span>delete</span>
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
@endsection
