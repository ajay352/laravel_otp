<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendOTPJob;


class OTPController extends Controller
{
    public function sendotp(Request $request){
        $otp = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        $email=$request->email;
        
        SendOTPJob::dispatch($otp, $email);
        // Mail::send('welcome', ['otp' => $otp], function ($message) use ($request) {
        //     $message->to($request->email)
        //     ->subject('Your OTP');
        // });

        $request->session()->put('otp', $otp);

        return redirect('/otpcheck');



    }
    public function otpcheck(){
        return view('otpcheck');
    }
    public function otpverify(Request $request){
        $inputOTP = $request->otp;
        $storedOTP = $request->session()->get('otp');
        $attempts = session('otp_attempts', 0);
        if ($inputOTP !== $storedOTP) {
            $attempts++; // Increment the failed attempts
            session(['otp_attempts' => $attempts]);
    
            if ($attempts >= 3) {
                // Redirect to the first interface
                session()->forget('otp_attempts'); // Clear the attempts counter
                return redirect('/')->with('error', 'You have exceeded the maximum OTP attempts.');
            } else {
                return redirect('otpcheck')->with('error', 'Invalid OTP. You have ' . (3 - $attempts) . ' attempts remaining.');
            }
        }
    
        // Clear the attempts counter on successful OTP verification
        session()->forget('otp_attempts');    
        if ($inputOTP === $storedOTP) {
            return view('success');
        }else{
            return view('error');
        }
        
    }
}
