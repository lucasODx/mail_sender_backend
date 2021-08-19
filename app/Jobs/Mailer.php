<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Mailer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    
    public function __construct(\stdClass $user)
    {
        $this->user = $user;
    }

    
    // Envia e-mail com base no objeto vindo da rota add
    public function handle()
    {
        \Illuminate\Support\Facades\Mail::send(new \App\Mail\Mailer($this->user));
    }
}
