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
                <h4 class="panel-title">{{$thread->title}}</h4>
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
                @foreach($thread->threadMessages($thread->pivot->created_at) as $index => $msg)
                    <div class="well">
                        <div class="ffy-mailbox-msg-info">
                            <span class="ffy-mailbox-name">{{$msg->author->name}} </span>
                            <span class="ffy-mailbox-date">on {{$msg->created_at->format('Y-m-d H:i')}}</span>:
                        </div>
                        <div class="ffy-mailbox-msg">
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