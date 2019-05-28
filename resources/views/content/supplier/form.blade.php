@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    @if (isset($supplier))
                        {{ 'Edit ' }}
                    @else
                        {{ 'Tambah ' }}
                    @endif
                    Supplier
                </h3>
                @if (isset($supplier))
                    {!! Form::model($supplier, ['method' => 'put', 'class' => 'form-horizontal']) !!}
                @else
                    {!! Form::open(['class' => 'form-horizontal']) !!}
                @endif
                @csrf
                <div class="col-md-8 mx-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="text-center">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-md-4">Nama</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Supplier" value="{{ isset($supplier) ? $supplier->name_supplier : '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telp" class="col-form-label col-md-4">No Telpon</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomer Telpon Supplier" value="{{ isset($supplier) ? $supplier->no_telp : '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-form-label col-md-4">Alamat</label>
                        <div class="col-md-8">
                            <textarea name="alamat" id="alamat" cols="10" rows="10" class="form-control" placeholder="Masukan Alamat Supplier">{{ isset($supplier) ? $supplier->alamat : '' }}</textarea>
                        </div>
                    </div>
                    <a href="{{ url('/supplier') }}" class="btn btn-secondary float-left"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                    <button class="btn btn-primary float-right" type="submit"><i class="mdi mdi-content-save-outline"></i> Simpan</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection