<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Strategy;
use App\Account;
use App\Campaign;
use App\Report;

class ClientsController extends Controller
{
    public function dashboard($id){
        // $user = User::find($id);
        return view('clients.dashboard');
    }

    public function campaigns($id){
        $campaigns = Campaign::where('client_id',$id)->get();
        return view('clients.campaigns')->with('campaigns',$campaigns);
    }

    public function reports($id){
        $reports = Report::where('client_id',$id)->get();
        return view('clients.reports')->with('reports',$reports);
    }

    // public function notifications($id){
    //     //find user by id

    //     return view('clients.dashboard');
    //     //->with('client',$client);
    // }

    public function strategies($id){
        $strategies = Strategy::where('client_id',$id)->get();
        return view('clients.strategies')->with('strategies',$strategies);
    }

    public function account_details($id){
        $account = Account::where('client_id',$id)->get();
        $due = 0;
        $done = 0;
        foreach($account as $acc){
            $due+=$acc['due_payments'];
            $done+=$acc['done_payments'];
        }
        return view('clients.account_details')->with(['due'=>$due,'done'=>$done]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('clients.edit')->with('user',$user);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|string',
            'phone_no'=>'required|string|size:10|unique:users,phone_no,'.$id,
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'string|confirmed|nullable'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_no = $request->input('phone_no');
        if($request->input('password')!=null)
            $user->password = Hash::make($request->input('password'));
        $user->save();
        
        return redirect('/dashboard/clients/'.$user->id)->with('success','Profile successfully updated!');
    }

    public function destroy(Request $request,$id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Client successfully deleted!');
    }

    public function show_strategy($id){
        $strategy = Strategy::find($id);
        return view('clients.strategy_detail')->with('strategy',$strategy);
    }

}
