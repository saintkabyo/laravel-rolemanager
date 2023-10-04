<?php

namespace Riasad\Rolemanager\Http\Controllers;

use Illuminate\Http\Request;
use Riasad\Rolemanager\Models\Role;
use Riasad\Rolemanager\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where(function($query)use($request){
            if($request->search)
            {
                $query->where('name','LIKE','%'.$request->search.'%');
            }
        })->paginate(10);
        $data['users'] = $users;
        return view('rolemanager::users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::find($id);
        $data['roles'] = Role::all();
        return view('rolemanager::users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'role_ids'=>'required',
        ];

        $request->validate($rules);

        $user = User::find($id);
        $user->roles()->sync($request->role_ids);
        return redirect()->route('rolemanager.users.index')->with('success','User updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
