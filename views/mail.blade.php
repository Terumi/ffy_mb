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

            <a href="{{url('mailbox')}}" class="btn btn-primary pull-left">Back</a>
        <form action="{{url("/mailbox/delete/{$thread->id}")}}" method="post" class="ml5">
            <!-- Submit button -->
            {{csrf_field()}}
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-md">Delete Message</button>
            </div>
        </form>
        <div class="panel panel-default mt45">
            <div class="panel-heading intro">

                <h3 class="panel-title">{{$thread->title}}</h3>
            </div>
            <div class="panel-body">
                @foreach($thread->messages as $index => $msg)
                    @if($index > 0)
                        <hr>
                    @endif
                    <strong>{{$msg->author->name}}</strong> wrote:
                    <p class="text-muted pull-right">{{$msg->created_at->format('Y-m-d H:i')}}</p>
                    <div class="msg">
                        {{$msg->body}}
                    </div>

                @endforeach
            </div>
        </div>

        <form action="{{url('/mailbox/message/'.$thread->id.'/reply')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="body">Reply</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary">Send</button>
        </form>

    </div>


@stop