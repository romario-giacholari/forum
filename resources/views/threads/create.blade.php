@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Create a New Thread </div>
                    <div class="panel-body">
                     
                    <form action="/threads" method="POST">
                        {{csrf_field()}}

                        <div class="form-group">
                         <label for="channel_id">Pick a channel</label>
                         <select name='channel_id' id ='channel_id' class="form-control" required="">
                         <option value="">Choose One</option>
                            @foreach(App\Channel::all() as $channel)
                            <option value="{{$channel->id}}">{{$channel->name}}</option>
                            @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                         <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" value ="{{old('title')}}" required="">
                        

                        <div class="form-group">
                         <label for="body">Body:</label>
                            <textarea  class="form-control" name="body" id="body" rows="8" required="">{{old('body')}}</textarea>
                            </div>
                        </div>

                        <div class ='form-group'>
                        <button type="submit" class="btn btn-primary ">Publish</button>
                        </div>
                     </form>

                     @if(count($errors))
 
                        <ul class ="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>

                     @endif

                    </div>
            </div>
        </div>
    </div>

@endsection