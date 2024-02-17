<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
        // show all rolles 
        public function Index(){
            $users = User::all();
            return view('admin.users.index', compact('users'));
        }

         // create all rolles 
    public function Create(){
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

     // store all rolles 
     public function Store(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        // dd($request->roles);
        // dd($request);
        // process data 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();


        if($request->roles){
            $user->assignRole($request->roles); 
        }


        // $input = $request->all();
        // $input['password'] = FacadesHash::make($input['password']);

        // $user = User::create($input);
        // $user->assignRole($request->input('roles'));

        

        $notification = array('message' => 'User created successfully', 'alert_type' => 'success');
        return redirect()->route('user.index')->with($notification);

    }

        // create all rolles 
        public function Edit($id){
            $user = User::findById($id);
            $role = Role::all();
            return view('admin.roles.edit', compact('user', 'role'));
        }

         // delete permission 
    public function Destroy ($id){
        $user = User::findById($id);
        if(!is_null($user)){
            $user->delete();
        }
        $notification = array('message' => 'Role deleted successfully', 'alert_type' => 'success');
        return redirect()->route('role.index')->with($notification);
    }

}
