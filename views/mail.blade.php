@extends('layouts.master')
@section('content')


    <div class="container mt45">
        <div class="panel panel-default mt45">
            <div class="panel-heading intro">

                <h3 class="panel-title">{{$thread->title}}</h3>
            </div>
            <div class="panel-body">
                @foreach($thread->messages as $msg)
                    <strong>{{$msg->author->name}} {{$msg->author->email}}</strong>: {{$msg->body}}
                    <hr>
                @endforeach
            </div>
        </div>

        <form action="{{url('/mailbox/message/'.$thread->id.'/reply')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="body">Message</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary">send</button>
        </form>

        <form action="{{url("/mailbox/delete/{$thread->id}")}}" method="post">
            <!-- Submit button -->
            {{csrf_field()}}
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Delete Message</button>
            </div>

        </form>

    </div>


@stop