<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class Ab implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $expiryTime = Carbon::now()->subMinutes();
        // DB::table('password_reset_tokens')->where('created_at', '<', $expiryTime)->delete();
        User::where('created_at', '<', $expiryTime)->update(['remember_token' => null]);
    }
}
// use App\Jobs\ExpirePasswordResetTokensJob;

// dispatch(new ExpirePasswordResetTokensJob());