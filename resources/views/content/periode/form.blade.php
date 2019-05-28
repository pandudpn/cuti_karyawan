@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    @if (isset($periode))
                        {{ 'Edit ' }}
                    @else
                        {{ 'Tambah ' }}
                    @endif
                    Periode
                </h3>
                <div class="col-md-6 mx-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="text-center">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (isset($periode))
                        {!! Form::model($periode, ['method' => 'put', 'class' => 'form-horizontal']) !!}
                    @else
                        {!! Form::open(['class' => 'form-horizontal']) !!}
                    @endif
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-md-4">Nama Periode</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Januari - Maret 2019 (3 bulan sekali)" value="{{ isset($periode) ? $periode->name_periode : '' }}">
                        </div>
                    </div>
                    <a href="{{ url('/periode') }}" class="btn btn-secondary float-left"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                    <button class="btn btn-primary float-right"><i class="mdi mdi-content-save"></i> Simpan</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection