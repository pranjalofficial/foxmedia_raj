<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Strategy;
use Illuminate\Support\Facades\Hash;

class AccountManagerController extends Controller
{
    public function dashboard(){
        return view('account_manager.dashboard');
    }

    public function edit($id){
        $user = User::find($id);
        return view('account_manager.edit')->with('user',$user);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email,'.$id,
            'phone_no'=>'required|string|size:10|unique:users,phone_no,'.$id,
            'password'=>'string|confirmed|nullable'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password')!=null)
            $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/dashboard/account_manager/'.$user->id)->with('success','Profile successfully updated!');
    }

    public function clients(){
        $clients = User::where('role','Client')->get();
        return view('account_manager.clients')->with('clients',$clients);
    }

    public function agencies(){
        $agencies = User::where('role','Agency')->get();
        return view('account_manager.agencies')->with('agencies',$agencies);
    }

    public function new_client(){
        return view('account_manager.new_client');
    }

    public function store_client(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'phone_no'=>'required|string|size:10|unique:users',
            'company_name'=>'required|string',
            'company_website'=>'required|url',
            'description'=>'required|string',
            'budget'=>'required|integer'
        ]);

        function getRandomString($length = 8){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = '';
        
            for($i=0;$i<$length;$i++){
                $string .= $characters[mt_rand(0,strlen($characters)-1)];
            }
        
            return $string;
        }
        $password = getRandomString();
        $user = new User;
        $user->name = $request->input('name');
        $user->email =  $request->input('email');
        $user->phone_no = $request->input('phone_no');
        $user->password = Hash::make($password);
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

        return redirect('/clients/'.auth()->user()->id)->with('success','Client successfully added!');
    }

    public function new_agency(){
        return view('account_manager.new_agency');
    }

    public function store_agency(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'phone_no'=>'required|string|size:10|unique:users',
            'company_name'=>'required|string',
            'company_website'=>'required|url',
            'description'=>'required|string',
            'portfolio'=>'required|url',
            'password'=>'required|string|confirmed|min:8'
        ]);

        $user = new User;
        $agency = new Agency;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_no = $request->input('phone_no');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Agency';
        $user->save();

        $agency->name = $request->input('name');
        $agency->email = $request->input('email');
        $agency->company_name = $request->input('company_name');
        $agency->company_website = $request->input('company_website');
        $agency->portfolio = $request->input('portfolio');
        $agency->description = $request->input('description');
        $agency->save();

        return redirect('/agencies/'.auth()->user()->id)->with('success','Agency successfully added!');
    }

    public function destroy(Request $request,$id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Manager successfully deleted!');
    }
}
