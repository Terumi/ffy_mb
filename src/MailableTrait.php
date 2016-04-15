<?php


    namespace ffy\mailbox;

    trait MailableTrait
    {
        public function threads()
        {
            return $this->belongsToMany(Thread::class, 'ffy_mailbox_thread_recipient', 'user_id')->withPivot('seen')->orderBy('updated_at', 'desc');
        }

        public function unseenThreads()
        {
            return $this->threads()->where('seen', 0)->get()->count();
        }

        public function paginatedThreads()
        {
            return $this->threads()->paginate(15);
        }
    }