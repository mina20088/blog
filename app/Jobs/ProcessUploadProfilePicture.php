<?php

namespace App\Jobs;

use App\Models\User;
use App\services\UploadService;
use App\services\UsersService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\UploadedFile;

class ProcessUploadProfilePicture implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User $user,
        public UploadedFile $file

    )
    {
        $this->onQueue('upload');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         UploadService::uploadProfilePicture($this->file, $this->user);
    }
}
