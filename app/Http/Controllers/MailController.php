<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoEmail;
use App\Mail\PasswordEmail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        Mail::to($request->input('email'))->send(new DemoEmail($request->input('email')));

        function getRandomString($length = 8) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = '';
        
            for ($i = 0; $i < $length; $i++) {
                $string .= $characters[mt_rand(0, strlen($characters) - 1)];
            }
        
            return $string;
        }
        $password = getRandomString();
        Mail::to($request->input('email'))->send(new PasswordEmail($password,$request->input('email')));

        $user = new User;
        $user->email = $request->input('email');
        $user->password = Hash::make($password);
        $user->role = 'Client';
        $user->save();

        return redirect()->back()->with('success','An email has been sent to you.');
    }
}
