<?php

    Route::group(["prefix" => 'mailbox'], function () {
        Route::get('/', 'ffy\mailbox\Http\Controllers\MailboxController@inbox');
        Route::get('/sent', 'ffy\mailbox\Http\Controllers\MailboxController@sent');
        Route::get('/message/{id}', 'ffy\mailbox\Http\Controllers\MailboxController@message');
        Route::post('/message/{id}/reply', 'ffy\mailbox\Http\Controllers\MailboxController@reply');
        Route::post('/delete/{thread_id}', 'ffy\mailbox\Http\Controllers\MailboxController@deleteMessage');

        Route::post('/send', 'ffy\mailbox\Http\Controllers\MailboxController@newMessage');

    });


