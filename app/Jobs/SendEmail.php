<?php

namespace App\Jobs;

use App\Mail\VisitorRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Queueable;

    protected $receiver;
    protected $full_name;

    /**
     * Create a new job instance.
     */
    public function __construct(string $receiver, string $full_name)
    {

        $this->receiver = $receiver;
        $this->full_name = $full_name;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Sending email to ' . $this->receiver);
        Mail::to($this->receiver)->send(new VisitorRegistered($this->full_name));
    }
}
