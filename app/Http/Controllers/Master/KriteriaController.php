<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index(){
        $judul      = 'Kriteria';
        $kriteria   = Kriteria::all();
        return view('content.kriteria.index', compact('judul', 'kriteria'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $judul  = 'Tambah Kriteria';
            return view('content.kriteria.form', compact('judul'));
        }else{
            $validation = [
                'name'  => 'required'
            ];
            $rules      = [
                'required'  => ':attribute harus di isi.'
            ];
            $names      = [
                'name'      => 'Nama Kriteria'
            ];
            $this->validate($request, $validation, $rules, $names);

            $kr     = new Kriteria();
            $kr->name_kriteria  = $request->input('name');
            $kr->save();

            return redirect('/kriteria')->with('success', 'Sukses menambahkan kriteria');
        }
    }

    public function edit(Request $request, $id){
        if($request->isMethod('get')){
            $judul      = 'Edit Kriteria';
            $kriteria   = Kriteria::find($id);
            return view('content.kriteria.form', compact('judul', 'kriteria'));
        }else{
            $validation = [
                'name'  => 'required'
            ];
            $rules      = [
                'required'  => ':attribute harus di isi.'
            ];
            $names      = [
                'name'      => 'Nama Kriteria'
            ];
            $this->validate($request, $validation, $rules, $names);

            $kr     = Kriteria::find($id);
            $kr->name_kriteria  = $request->input('name');
            $kr->save();

            return redirect('/kriteria')->with('success', 'Sukses merubah kriteria '.$kr->name_kriteria);
        }
    }

    public function delete($id){
        Kriteria::destroy($id);
        return redirect('/kriteria')->with('success', 'Sukses menghapus kriteria');
    }
}
