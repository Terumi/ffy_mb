<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="mailModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New message</h4>
            </div>
            <form action="#" id="mailbox-new-mail">
                <div class="modal-body">

                    <div class="alert alert-danger" id="errors" style="display: none">
                        <p id="to-error" style="display: none">Please select one or more recipients.</p>
                        <p id="title-error" style="display: none">The title field is required.</p>
                        <p id="body-error" style="display: none">Cannot send a message without text!</p>
                    </div>

                    <div class="form-group">
                        <label for="to">To:</label>
                        <select class="userSearch" name="to[]"></select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Message Title"/>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="body" id="body" class="form-control ckeditor"></textarea>
                        {{ csrf_field() }}
                    </div>
                </div>

                <div class="modal-footer">
                    <ul class="list-buttons pull-right">
                        <li>
                            <input type="submit" class="btn btn-primary" value="send">
                        </li>
                        <li>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>