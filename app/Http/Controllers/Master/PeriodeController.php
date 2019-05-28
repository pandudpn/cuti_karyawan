<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Periode;

class PeriodeController extends Controller
{
    public function index(){
        $judul      = 'Periode';
        $periode    = Periode::all();

        return view('content.periode.index', compact('judul', 'periode'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $judul  = 'Tambah Periode';
            return view('content.periode.form', compact('judul'));
        }else{
            $validation = [
                'name'  => 'required'
            ];
            $rules      = ['required' => ':attribute harus di isi.'];
            $names      = ['name' => 'Nama Periode'];
            $this->validate($request, $validation, $rules, $names);

            $pr = new Periode();
            $pr->name_periode   = $request->input('name');
            $pr->save();

            return redirect('/periode')->with('success', 'Berhasil menambahkan periode baru');
        }
    }

    public function edit(Request $request, $id){
        if($request->isMethod('get')){
            $judul      = 'Edit Periode';
            $periode    = Periode::find($id);
            return view('content.periode.form', compact('judul', 'periode'));
        }else{
            $validation = [
                'name'  => 'required'
            ];
            $rules      = ['required' => ':attribute harus di isi.'];
            $names      = ['name' => 'Nama Periode'];
            $this->validate($request, $validation, $rules, $names);

            $pr = Periode::find($id);
            $pr->name_periode   = $request->input('name');
            $pr->save();

            return redirect('/periode')->with('success', 'Berhasil merubah periode '.$pr->name_periode);
        }
    }

    public function delete($id){
        Periode::destroy($id);
        return redirect('/periode')->with('success', 'Berhasil menghapus periode');
    }
}
