<a href="{{url('mailbox/message/'.$thread->id)}}" class="list-group-item {{$thread->pivot->seen? "read" : ""}}">
    <span class="name" style="min-width: 120px; display: inline-block; margin-right: 15px">{{$thread->otherRecipient(Auth::id())->name}}</span>
    <strong class="">{{$thread->title}}</strong>
    <span class="badge">{{$thread->updated_at}} </span>
</a>