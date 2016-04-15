<?php

    namespace ffy\mailbox;

    use App\User;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;

    class Message extends Model
    {
        protected $table = 'ffy_mailbox_message';
        protected $fillable = ['body', 'author_id', 'thread_id'];

        public function author()
        {
            return $this->belongsTo(User::class, 'author_id');
        }

        public function thread()
        {
            return $this->belongsTo(Thread::class);
        }

        public function recipients()
        {
            return $this->belongsToMany(User::class, 'ffy_mailbox_thread_recipient');
        }

        /*public function unsee()
        {
            $this->setAttribute('seen', 0);
            $this->setAttribute('seen_at', null);
            return $this->save();
        }*/
    }
