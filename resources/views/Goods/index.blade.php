@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Filters</div>
                    <div class="panel-body">
                        <form method="get" action="goods">
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <input type="text" class="form-control" name="category" id="category">
                            </div>

                            <div class="form-group">
                                <label for="characteristic">Characteristic:</label>
                                <input type="text" class="form-control" name="characteristic" id="characteristic">
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Goods</div>

                    <div class="panel-body">
                        @foreach($goods as $good)
                            <div class="col-md-4">
                                <p>{{asset($good->photo)}}</p>
                                <img src="{{asset($good->photo)}}" alt="image not found" width="100%"><br>
                                <p>{{$good->name}}</p>
                                <a href="/goods/update/{{$good->id}}" class="btn btn-primary" role="button">Update</a>
                                <a href="/goods/delete/{{$good->id}}" class="btn btn-danger" role="button">Delete</a>
                            </div>
                        @endforeach
                    </div>
                    {!! $goods->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection