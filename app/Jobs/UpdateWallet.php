<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UpdateWallet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $userId;
    public function __construct($userId)
{
    $this->userId = $userId;
}

public function handle()
{
    Log::info('pramod');
    // Log::info('Updating wallet balance for user: ' . $this->userId);

    $user = User::find($this->userId);

    
    // Update the wallet balance
    $user->wallet = 1000.00;
    $user->save();
}
    
}


