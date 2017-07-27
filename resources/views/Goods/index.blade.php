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
                    <div class="panel-heading">
                        Goods
                        <a href="/goods/create" class="btn btn-success pull-right btn-sm" role="button">Create</a>

                    </div>

                    <div class="panel-body">
                        @foreach($goods as $good)
                            <a href="good/{{$good->id}}">
                                <div class="col-md-4" style="height: 250px">
                                    @if(!$good['photo'])
                                        {{$good['photo'] = 'images/tmp.jpg'}}
                                    @endif
                                    <img src="{{asset('storage/'.$good->photo)}}" alt="image not found" width="100%"><br>
                                    <div style="position: absolute; bottom: 20px;">
                                        <h3>{{$good->name}}</h3>
                                        <form method="post" action="goods/delete/{{$good->id}}" >
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <a href="/goods/update/{{$good->id}}" class="btn btn-primary" role="button">Update</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    {!! $goods->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection