<?php

namespace Riasad\Rolemanager\Http\Controllers;

use Illuminate\Http\Request;
use Riasad\Rolemanager\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $permissions = Permission::where(function($query)use($request){
            if($request->search)
            {
                $query->where('name','LIKE','%'.$request->search.'%');
            }
        })->orderBy('name')->paginate(10);
        $data['permissions'] = $permissions;
        return view('rolemanager::permissions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rolemanager::permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name'=>'required'];
        $request->validate($rules);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('rolemanager.permissions.index')->with('success','Permission added');
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
        $data['permission'] = Permission::find($id);
        return view('rolemanager::permissions.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = ['name'=>'required'];
        $request->validate($rules);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('rolemanager.permissions.index')->with('success','Permission updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
