<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoEmail;
use App\Mail\PasswordEmail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Exception;

class MailController extends Controller
{
    public function send(Request $request)
    {
        try{
            Mail::to($request['email'])->send(new DemoEmail($request['email']));

        function getRandomString($length = 8) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = '';
        
            for ($i = 0; $i < $length; $i++) {
                $string .= $characters[mt_rand(0, strlen($characters) - 1)];
            }
        
            return $string;
        }
        $password = getRandomString();
        Mail::to($request['email'])->send(new PasswordEmail($password,$request['email']));

        try{
            $user = new User;
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->role = 'Client';
            $user->save();
        }catch(Throwable | Exception $e){
            return redirect()->back()->with('Alert',$e);
        }

        return redirect()->back()->with('success','An email has been sent to you.');
        
        }catch(Exception $e){
            return redirect()->back()->with('Alert',$e);
            
        }
    }
        
}
