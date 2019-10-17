<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $title      = 'Role';
        $role       = Role::all();
        return view('content.role.index', compact('title', 'role'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $title  = 'New Role';
            return view('content.role.form', compact('title'));
        }else{
            $validation = [
                'name'  => 'required'
            ];
            $rules      = [
                'required'  => ':attribute cannot be null.'
            ];
            $names      = [
                'name'      => 'Role Name'
            ];
            $this->validate($request, $validation, $rules, $names);

            $ro = new Role();
            $ro->name   = $request->input('name');
            $ro->save();

            return redirect('/role')->with('success', 'Success create a new Role');
        }
    }

    public function edit(Request $request, $id){
        if($request->isMethod('get')){
            $title      = 'Edit Role';
            $role       = Role::find($id);
            return view('content.role.form', compact('title', 'role'));
        }else{
            $validation = [
                'name'  => 'required'
            ];
            $rules      = [
                'required'  => ':attribute cannot be null.'
            ];
            $names      = [
                'name'      => 'Role Name'
            ];
            $this->validate($request, $validation, $rules, $names);

            $ro     = Role::find($id);
            $ro->name  = $request->input('name');
            $ro->save();

            return redirect('/role')->with('success', 'Success edit role');
        }
    }

    public function delete($id){
        Role::destroy($id);
        return redirect('/role')->with('success', 'Success deleted role');
    }
}
