<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use Auth;
use App\Option;
use App\Direction;
use Maatwebsite\Excel\Facades\Excel;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $_user_paginate =30 ;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
    	$users = (isset($request['role']) && !empty($request['role'])) ? User::role($request['role'])->paginate($this->_user_paginate) : User::orderBy('created_at','desc')->paginate($this->_user_paginate);
    	$roles = Role::orderBy('created_at','desc')->pluck('name');    	
    	return view('admin.users.index', compact('users','roles'));
        // return view('admin.users.index', ['users' => $users, 'roles' => $roles]);
    }

    public function show($id){
    	if(Auth::user()->hasRole('admin|Admin')){
            $user = User::findOrFail($id);
        }else{
            $user = Auth::user();
        }

        $users = $user->direction->users;
        $admin = User::findOrFail(1);
        $users = $users->diff(collect([$user,$admin]))->take(3);
        $directions = Direction::get();
    	return view('admin.users.show',compact('user','users','directions'));
    }
    
    public function create()
    {
        $user = Auth::user();
        $directions = Direction::all();
        if ($user->hasRole('admin')){
            $roles = Role::get();        
        }else{
            $roles = [];       
            // $roles = Role::get();     
        }
        return view('admin.users.create', compact('roles', 'directions'));
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        if ($request->email and $request->email != $user->email) {
            $this->validate($request,[
                'email' => 'required|email|unique:users',
            ]);
            $user->update([
                'email'=>$request['email'],
            ]);  
        }

        $user->statut = (!empty($request['statut']))? $request->statut : $user->statut;
        if ($request->newPassword) {
            $this->validate($request,[
                'newPassword' => 'required|string|min:6|confirmed',
            ]);
            $user->password = $request['newPassword'];
        }

        $user->save();

        if(empty($user->uuid)){$request['uuid'] = Uuid::uuid4()->toString();} // a enlevé après
        $user->update($request->except(['_token','email','password','statut']));

        if (Auth::user()->hasRole('admin')){
            if(!empty($request->roles)){
                $user->roles()->detach();
                $user->roles()->sync($request->roles);        
            }
        }
        
        flash('Profil modifié avec succes.')->success();
        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'roles' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $request['uuid'] = Uuid::uuid4()->toString();
        $request['created_by'] = Auth::user()->id;
        $request['remember_token'] = str_random(10);

        $user = User::create($request->except('roles'));
        
        if($request->roles <> ''){
            $user->roles()->attach($request->roles);
        }
        
        flash('Utilisateur créé')->success();
        return back(); 
    }

    public function edit(User $user)
    {
        $directions = Direction::get();
        return view('admin.users.show',compact('user','directions'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == Auth::id()) {
            flash('Impossible de supprimer ce compte')->error();
            return redirect()->back();
        } else {
            $user->delete();
            flash('Compte supprimé')->success();
            return redirect()->back();
        }
    }

    function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function directionset(Request $request)
    {

        $user = User::findOrFail($request->user);
        $user->directions()->detach();
        foreach($request->directions as $d){
             $user->directions()->attach($d);
        }
        $user->direction_id = $d;
        $user->save();
        return back();
    }
}
