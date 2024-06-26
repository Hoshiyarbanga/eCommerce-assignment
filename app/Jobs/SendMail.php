<?php

namespace App\Jobs;

use App\Mail\UserVerificationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
        public $users ;
        public function __construct($users)
        {
            $this->users = $users;
        }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->users->email)->send(new UserVerificationEmail($this->users));
    }
}
