<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class MailController extends Controller
{
    function add(Request $req)
    {
        $user = new stdClass();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->title = $req->title;
        $user->subject = $req->subject;
        \App\Jobs\Mailer::dispatch($user)->delay(now());
    }
}
