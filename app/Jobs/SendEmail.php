<?php

namespace App\Jobs;

use App\AdminUser;
use App\Mail\ResetPwd;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AdminUser $user)
    {
        //
        $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(AdminUser $user)
    {
        //
        $user=$this->user;
        $adminUser = config('constants.ADMIN_EMAIL');
        Mail::to($user)->cc($adminUser)->send(new ResetPwd($user));
    }
}
