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
                                        <td>Delete</td>
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
