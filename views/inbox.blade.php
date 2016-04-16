@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="panel panel-default mt45">
            <div class="panel-heading intro">
                <h3 class="panel-title">Messages</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-info" role="button" data-toggle="modal"
                                data-target="#mailModal">New Message
                        </button>
                        <div class="message-pagination pull-right">
                            @include('mailbox::partials.pagination_buttons', ['paginator' => $threads])
                        </div>
                    </div>
                </div>

                <div class="row mt25">
                    <div class="col-xs-12">
                        <div class="list-group">
                            @if($threads->count())
                                @foreach($threads as $thread)
                                    @include('mailbox::partials.message')
                                @endforeach
                            @endif
                        </div>
                        {{--@include('mailbox::partials.ad')--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('mailbox::partials.modal')
@stop