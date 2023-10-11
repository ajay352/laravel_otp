<?php
namespace App\Jobs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendOTPJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $otp;
    protected $email;

    public function __construct($otp, $email)
    {
        $this->otp = $otp;
        $this->email = $email;
    }

    public function handle()

    {
        
        
        
            Mail::send('welcome', ['otp' => $this->otp], function ($message) {
                $message->to($this->email)->subject('Your OTP');
            });
        
            
    }
}
