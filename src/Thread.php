<?php

    namespace ffy\mailbox;

    use App\User;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

    class Thread extends Model
    {
        protected $table = 'ffy_mailbox_thread';
        protected $fillable = ['title', 'author_id'];

        public function author()
        {
            return $this->belongsTo(User::class, 'author_id');
        }

        public function messages()
        {
            return $this->hasMany(Message::class);
        }

        public function last_message()
        {
            return $this->hasOne(Message::class, 'thread_id')->latest();
        }

        public function recipients()
        {
            return $this->belongsToMany(User::class, 'ffy_mailbox_thread_recipient');
        }

        public function getLatestMessageAttribute()
        {
            return $this->last_message()->first();
        }

        public function hasRecipient($id)
        {
            return $this->recipients->contains($id);
        }

        public function otherRecipient($id)
        {
            return $this->recipients->filter(function ($item) use ($id) {
                return $item->id != $id;
            })->first();

        }
    }
