<?php

namespace Riasad\Rolemanager\Http\Controllers;

use Illuminate\Http\Request;
use Riasad\Rolemanager\Models\Permission;
use Riasad\Rolemanager\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::where(function($query)use($request){
            if($request->search)
            {
                $query->where('name','LIKE','%'.$request->search.'%');
            }
        })->orderBy('name')->paginate(10);
        $data['roles'] = $roles;
        return view('rolemanager::roles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['permissions'] = Permission::orderBy('name')->get();
        return view('rolemanager::roles.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'permission_ids'=>'required',
        ];

        $request->validate($rules);

        $role = new Role;
        $role->name = $request->name;
        $role->save();

        $role->permissions()->sync($request->permission_ids);

        return redirect()->route('rolemanager.roles.index')->with('success','Role added');
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
        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::orderBy('name')->get();
        return view('rolemanager::roles.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'permission_ids'=>'required',
        ];

        $request->validate($rules);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $role->permissions()->sync($request->permission_ids);

        return redirect()->route('rolemanager.roles.index')->with('success','Role updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
