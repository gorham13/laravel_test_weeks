@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="post" action="update" enctype="multipart/form-data">

                    {{method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">Update good</div>

                        <div class="panel-body">

                            <input type="hidden" name="id" value="{{$goods->id}}">

                            <div class="form-group">
                                <label for="category">Category:</label>
                                <input type="text" class="form-control" name="category" id="category" value="{{$goods->category}}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$goods->name}}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{$goods->price}}">
                            </div>

                            <div class="form-group">
                                <label for="characteristic">Characteristic:</label>
                                <input type="text" class="form-control" name="characteristic" id="characteristic" value="{{$goods->characteristic}}">
                            </div>

                            <div class="form-group">
                                <label >Download image:</label>
                                <label class="btn btn-default btn-file">
                                    Browse <input type="file" name="image" accept="image/*" style="display: none;">
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection