@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{$good->name}}</h3></div>
                    <div class="panel-body" align="center">
                        @if($good['photo'])
                            <img src="{{asset('storage/'.$good->photo)}}" alt="image not found" width="100%"><br>
                        @else
                            <img src="{{asset('storage/images/tmp.jpg')}}" alt="image not found" width="100%"><br>
                        @endif
                        <p>{{$good->characteristic}}</p>
                        <p>Price: {{$good->price}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()