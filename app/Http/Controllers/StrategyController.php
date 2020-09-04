<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Strategy;

class StrategyController extends Controller
{
    public function new($email){
        try{
            return view('strategy.new')->with('user_email',$email);
        }catch(Throwable $e){
            return('error');
        }
    }

    public function new_inside(){
        return view('clients.strategy');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'phone_no'=>'required|string|size:10|unique:users',
            'company_name'=>'required|string',
            'company_website'=>'required|url',
            'description'=>'required|string',
            'budget'=>'required|integer'
        ]);

        $user = User::where('email',$request->input('email'))->first();
        $user->name = $request->input('name');
        $user->phone_no = $request->input('phone_no');
        $user->role = 'Client';
        $user->save();

        $strategy = new Strategy;
        $strategy->client_id = $user->id;
        $strategy->name = $request->input('name');
        $strategy->company_name = $request->input('company_name');
        $strategy->company_website = $request->input('company_website');
        $strategy->description = $request->input('description');
        $strategy->budget = $request->input('budget');
        $strategy->save();

        return redirect('/success');
    }

    public function store_inside(Request $request){
        $this->validate($request,[
            'company_name'=>'required|string',
            'company_website'=>'required|url',
            'description'=>'required|string',
            'budget'=>'required|integer'
        ]);

        $strategy = new Strategy;
        $strategy->client_id = auth()->user()->id;
        $strategy->name = auth()->user()->name;
        $strategy->company_name = $request->input('company_name');
        $strategy->company_website = $request->input('company_website');
        $strategy->description = $request->input('description');
        $strategy->budget = $request->input('budget');
        $strategy->save();

        return redirect('/strategies/clients/'.auth()->user()->id)->with('success','Strategy successfully submitted!');
    }
}
