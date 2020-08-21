<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Agency;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function clients(){
        $clients = User::where('role','Client')->get();
        return view('admin.clients')->with('clients',$clients);
    }

    public function agencies(){
        $agencies = Agency::all();
        return view('admin.agencies')->with('agencies',$agencies);
    }

    public function account_manager(){
        $account_managers = User::where('role','Account Manager')->get();
        return view('admin.account_manager')->with('account_managers',$account_managers);
    }

    public function admins(){
        $admins = User::where('role','Admin')->get();
        return view('admin.admins')->with('admins',$admins);
    }

    public function edit($type,$id){
        $user = User::find($id);
        return view('admin.edit')->with(['user'=>$user,'type'=>$type]);
    }

    public function update(Request $request,$type, $id){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email,'.$id,
            'phone_no'=>'required|string|size:10|unique:users,phone_no,'.$id,
            'password'=>'string|confirmed|nullable'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_no = $request->input('phone_no');
        if($request->input('password')!=null)
            $user->password = Hash::make($request->input('password'));
        $user->save();

        if($type=='Client')
            return redirect('/manage/clients/'.auth()->user()->id)->with('success','Profile successfully updated!');
        if($type=='Admin')
            return redirect('/manage/admins/'.auth()->user()->id)->with('success','Profile successfully updated!');
        if($type=='Account_Manager')
            return redirect('/manage/account_manager/'.auth()->user()->id)->with('success','Profile successfully updated!');
            
    }

    public function destroy(Request $request,$id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Admin successfully deleted!');
    }

    public function new($type){
        return view('admin.new')->with('type',$type);
    }

    public function store(Request $request, $type){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|unique:users|email',
            'phone_no'=>'required|string|size:10|unique:users',
            'password'=>'required|string|confirmed|min:8'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone_no = $request->input('phone_no');
        if($type=='Account_Manager')
            $user->role = 'Account Manager';
        else   
            $user->role = $type;
        $user->save();

        if($type=='Client')
            return redirect('/manage/clients/'.auth()->user()->id)->with('success','Profile successfully created!');

        if($type=='Admin')
            return redirect('/manage/admins/'.auth()->user()->id)->with('success','Profile successfully created!');

        if($type=='Account_Manager')
            return redirect('/manage/account_manager/'.auth()->user()->id)->with('success','Profile successfully created!');

    }

    public function new_agency(){
        return view('admin.new_agency');
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

        return redirect('/manage/agencies/'.auth()->user()->id)->with('success','Agency successfully added!');
    }

    public function client_details($id){
        $user = User::find($id);
        return view('admin.client_details')->with('user',$user);
    }

    public function agency_details($id){
        $user = User::find($id);
        return view('admin.agency_details')->with('user',$user);
    }

    public function manager_details($id){
        $user = User::find($id);
        return view('admin.manager_details')->with('user',$user);
    }


    public function edit_agency($id){
        $user = User::find($id);
        $agency = Agency::where('email',$user->email)->first();
        return view('admin.edit_agency')->with(['user'=>$user,'agency'=>$agency]);
    }

    public function update_agency(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users,email,'.$id,
            'phone_no'=>'required|string|size:10|unique:users,phone_no,'.$id,
            'company_name'=>'required|string',
            'company_website'=>'required|url',
            'description'=>'required|string',
            'portfolio'=>'required|url',
            'password'=>'nullable|string|confirmed'
        ]);

        $user = User::find($id);
        $agency = Agency::where('email',$request->input('email'))->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_no = $request->input('phone_no');
        if($request->input('password')!=null)
            $user->password = Hash::make($request->input('password'));
        $user->save();

        $agency->name = $request->input('name');
        $agency->email = $request->input('email');
        $agency->company_name = $request->input('company_name');
        $agency->company_website = $request->input('company_website');
        $agency->portfolio = $request->input('portfolio');
        $agency->description = $request->input('description');
        $agency->save();

        return redirect('/manage/agencies/'.auth()->user()->id)->with('success','Agency successfully updated!');
    }
}
