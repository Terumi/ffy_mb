<?php

    namespace ffy\mailbox\Http\Requests;

    use App\Http\Requests\Request;
    use Illuminate\Support\Facades\Auth;

    class SendMessageRequest extends Request
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return Auth::check();
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules()
        {
            return [
                'to' => 'required',
                'title' => 'required',
                'body' => 'required'
            ];
        }
    }
