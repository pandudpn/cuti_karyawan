<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(){
        $judul      = 'Supplier';
        $supplier   = Supplier::all();
        return view('content.supplier.index', compact('judul', 'supplier'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $judul  = 'Tambah Supplier';
            return view('content.supplier.form', compact('judul'));
        }else{
            $validation = [
                'name'      => 'required',
                'no_telp'   => 'required|numeric',
                'alamat'    => 'required'
            ];
            $value      = [
                'required'  => ':attribute harus di isi.',
                'numeric'   => ':attribute harus di isi dengan angka.'
            ];
            $names      = [
                'name'      => 'Nama Supplier',
                'no_telp'   => 'Nomer Telpon',
                'alamat'    => 'Alamat Supplier'
            ];

            $this->validate($request, $validation, $value, $names);

            $sp     = new Supplier();
            $sp->name_supplier  = $request->input('name');
            $sp->no_telp        = $request->input('no_telp');
            $sp->alamat         = $request->input('alamat');
            $sp->save();

            return redirect('/supplier')->with('success', 'Berhasil menambahkan supplier baru');
        }
    }

    public function edit(Request $request, $id){
        if($request->isMethod('get')){
            $judul      = 'Edit Supplier';
            $supplier   = Supplier::find($id);
            return view('content.supplier.form', compact('judul', 'supplier'));
        }else{
            $validation = [
                'name'      => 'required',
                'no_telp'   => 'required|numeric',
                'alamat'    => 'required'
            ];
            $value      = [
                'required'  => ':attribute harus di isi.',
                'numeric'   => ':attribute harus di isi dengan angka.'
            ];
            $names      = [
                'name'      => 'Nama Supplier',
                'no_telp'   => 'Nomer Telpon',
                'alamat'    => 'Alamat Supplier'
            ];

            $this->validate($request, $validation, $value, $names);

            $sp     = Supplier::find($id);
            $sp->name_supplier  = $request->input('name');
            $sp->no_telp        = $request->input('no_telp');
            $sp->alamat         = $request->input('alamat');
            $sp->save();

            return redirect('/supplier')->with('success', 'Berhasil merubah data supplier '.$sp->name);
        }
    }

    public function delete($id){
        Supplier::destroy($id);
        return redirect('/supplier')->with('success', 'Berhasil menghapus supplier');
    }
}
