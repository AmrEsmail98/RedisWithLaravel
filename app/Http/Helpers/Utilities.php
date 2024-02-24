<?php

use Illuminate\Support\Facades\Mail;

function sendMail($templete, $to, $subject, $data) {
    Mail::send($templete, $data->toArray(), function ($message) use ($to, $subject) {
        $message->subject($subject);
        $message->to($to);
    });
}
