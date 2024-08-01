<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\mail as sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class emailController extends Controller
{
    // public function sendmail()
    // {
    //     $toEmail = "infoatwheelsonweb@gmail.com";
    //     $message = "first email from laravel";
    //     $subject = "learning laravel";
    //     $detail = [
    //         'name' => "email testing",
    //         'scenario' => "email with detail variable or section"
    //     ];
    //     $request = Mail::to($toEmail)->cc("test@gmail.com")->send(new sendmail($message, $subject, $detail));
    //     dd($request);
    // }

    public function sendmail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:255',
            'file' => 'required|mimes:pdf,docx,doc,xls|max:4072'
        ]);

        $filename = time() . "." . $request->file('file')->extension();
        $request->file('file')->move('uploads', $filename);

        $response = Mail::to("infoatwheelsonweb@gmail.com")->send(new sendmail($request->all(), $filename));
        if ($response) {
            return back()->with('success', 'form submitted succesfully');
        } else {
            return back()->with('error', 'form email is not succesfully');
        }


    }

    public function contactForm()
    {
        return view('mail.mail');
    }
}
