<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-info" href="{{url('mailbox')}}">Inbox <span class="badge">42</span></a>
        <!-- Single button -->
        <button class="btn btn-danger" role="button" data-toggle="modal"
                data-target="#mailModal">New Message
        </button>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Actions
                <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Mark all as read</a></li>
                <li><a href="#">Delete selected messages</a></li>
                <li class="divider"></li>
                <li><a href="#">Delete selected messages</a></li>
            </ul>
        </div>
        @include('mailbox::partials.pagination')
    </div>
</div>