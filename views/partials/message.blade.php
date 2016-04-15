<a href="{{url('mailbox/message/'.$thread->id)}}" class="list-group-item {{$thread->pivot->seen? "read" : ""}}">
    <div class="checkbox">
        <label>
            <input type="checkbox">
        </label>
    </div>
    <span class="name" style="min-width: 120px; display: inline-block; margin-right: 15px">{{$thread->otherRecipient(Auth::id())->name}}</span>
    <strong class="">{{$thread->title}}</strong>
    <span class="badge">{{$thread->created_at}}</span>
</a>