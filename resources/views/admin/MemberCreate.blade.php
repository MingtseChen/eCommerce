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


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
