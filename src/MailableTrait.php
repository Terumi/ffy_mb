<?php


namespace ffy\mailbox;

trait MailableTrait
{
    public function threads()
    {
        return $this->belongsToMany(Thread::class, 'ffy_mailbox_thread_recipient', 'user_id')->withPivot('seen')->orderBy('updated_at', 'desc');
    }

    public function paginatedThreads()
    {
        return $this->threads()->paginate(15);
    }
}