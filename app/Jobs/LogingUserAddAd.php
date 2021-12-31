<?php

namespace App\Jobs;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogingUserAddAd implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $advertisement;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Advertisement $advertisement)
    {
        //
        $this->user = $user;
        $this->advertisement = $advertisement;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Log::debug('user ' . $this->user->id . ' add an ad with this id : ' . $this->advertisement->id);
    }
}
