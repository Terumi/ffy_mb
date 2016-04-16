<?php

    namespace ffy\mailbox\Http\Controllers;

    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use ffy\mailbox\Http\Requests\ReplyToMessageRequest;
    use ffy\mailbox\Http\Requests\SendMessageRequest;
    use ffy\mailbox\Message;
    use ffy\mailbox\Thread;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Response;


    class MailboxController extends Controller
    {

        public function inbox()
        {
            //Auth::user()->unseenThreads();
            $threads = Auth::user()->paginatedThreads();
            return view('mailbox::inbox')->with('threads', $threads);
        }

        public function message($id)
        {

            $thread = Thread::with('author')->find($id);
            if (!is_null($thread) && $thread->hasRecipient(Auth::id())) {

                DB::table('ffy_mailbox_thread_recipient')
                    ->whereRaw("thread_id = " . $thread->id . " and user_id = " . Auth::id())
                    ->update(['seen' => 1]);

                return view('mailbox::mail')->with('thread', $thread);
            }

            App::abort('402', 'User is not permitted to view this email');
        }

        public function newMessage(SendMessageRequest $request)
        {
            foreach ($request->get('to') as $to) {

                if ($to == Auth::id())
                    continue;

                $thread = Thread::create([
                    "title" => $request->get('title'),
                    "author_id" => Auth::id(),
                    "recipient_id" => $to,
                ]);

                $message = Message::create([
                    'author_id' => Auth::id(),
                    'body' => $request->get('body'),
                    'thread_id' => $thread->id
                ]);

                $thread->recipients()->attach(Auth::id(), ['seen' => true]);
                $thread->recipients()->attach($to, ['seen' => false]);
            }

            $message = json_encode("ok");
            return Response::make($message, 200);

            //todo: send to people (with notification and all)
        }

        public function reply(ReplyToMessageRequest $request, $thread_id)
        {

            Thread::find($thread_id)->touch();

            $this->unsee_thread_for_recipient($thread_id);

            Message::create([
                'author_id' => Auth::id(),
                'body' => $request->get('body'),
                'thread_id' => $thread_id
            ]);
            return Redirect::to('mailbox');
        }

        public function deleteMessage($thread_id)
        {
            $thread = Thread::find($thread_id);
            $thread->recipients()->detach(Auth::id());
            if (!$thread->recipients->count())
                $thread->delete();

            return Redirect::to('mailbox');
        }

        /**
         * @param $thread_id
         */
        protected function unsee_thread_for_recipient($thread_id)
        {
            DB::table('ffy_mailbox_thread_recipient')
                ->where('thread_id', $thread_id)
                ->where('user_id', '!=', Auth::id())
                ->update(['seen' => 0]);
        }
    }
