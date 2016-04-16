@extends('layouts.master')
@section('content')

    <div class="container mt45">

        @if($errors->count())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading intro">
                <h3 class="panel-title">{{$thread->title}}</h3>
            </div>
            <div class="panel-body">
                <a href="{{url('mailbox')}}" class="btn btn-primary pull-left">Back</a>
                <form action="{{url("/mailbox/delete/{$thread->id}")}}" method="post" class="ml5">
                    <!-- Submit button -->
                    {{csrf_field()}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-md">Delete Message</button>
                    </div>
                </form>
                @foreach($thread->messages as $index => $msg)
                    <div class="well">
                        <strong>{{$msg->author->name}}</strong> <span class="text-muted">on {{$msg->created_at->format('Y-m-d H:i')}}</span>:
                        <hr>
                        <div class="msg">
                            {!! $msg->body !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <form action="{{url('/mailbox/message/'.$thread->id.'/reply')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <textarea name="body" id="body" cols="30" rows="6" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary">Reply</button>
        </form>
    </div>
@stop