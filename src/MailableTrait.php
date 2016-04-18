<?php


    namespace ffy\mailbox;

    trait MailableTrait
    {
        public function threads()
        {
            return $this->belongsToMany(Thread::class, 'ffy_mailbox_thread_recipient', 'user_id')->withPivot('seen', 'created_at')->orderBy('updated_at', 'desc');
        }

        public function thread($thread_id){
            return $this->threads()->where('thread_id', $thread_id)->first();
        }

        public function paginatedThreads()
        {
            return $this->threads()->paginate(15);
        }

        public function unseenThreads()
        {
            return $this->threads()->where('seen', 0)->get()->count();
        }
    }