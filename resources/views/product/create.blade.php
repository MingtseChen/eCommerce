@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <br/>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{route('product.store')}}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input id="price" type="text" class="form-control" name="price" required
                                               autofocus>
                                        <div class="input-group-addon">.00</div>
                                    </div>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('release_date') ? ' has-error' : '' }}">
                                <label for="release_date" class="col-md-4 control-label">Release Date</label>

                                <div class="col-md-6">
                                    <input id="release_date" type="text" class="form-control" name="release_date"
                                           required autofocus>

                                    @if ($errors->has('release_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('release_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('auther') ? ' has-error' : '' }}">
                                <label for="auther" class="col-md-4 control-label">Auther</label>

                                <div class="col-md-6">
                                    <input id="auther" type="text" class="form-control" name="auther" required
                                           autofocus>

                                    @if ($errors->has('auther'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('auther') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('retailer') ? ' has-error' : '' }}">
                                <label for="desc" class="col-md-4 control-label">Retailer</label>

                                <div class="col-md-6">
                                    <input id="retailer" type="text" class="form-control" name="retailer" required
                                           autofocus>

                                    @if ($errors->has('retailer'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('retailer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                                <label for="desc" class="col-md-4 control-label">Desc</label>
                                <div class="col-md-6">
                                    <textarea id="desc" class="form-control" name="desc" autofocus
                                              style="height: 200px"></textarea>
                                    @if ($errors->has('desc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('ISBN') ? ' has-error' : '' }}">
                                <label for="desc" class="col-md-4 control-label">ISBN</label>

                                <div class="col-md-6">
                                    <input id="ISBN" type="text" class="form-control" name="ISBN" required autofocus>

                                    @if ($errors->has('ISBN'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ISBN') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <label for="file" class="col-md-4 control-label">Picture Upload</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" name="file">
                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                    <a class="btn btn-warning" href="{{route('product.index')}}">
                                        Return
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
