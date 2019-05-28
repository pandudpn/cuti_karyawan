@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    @if (isset($kriteria))
                        {{ 'Edit ' }}
                    @else
                        {{ 'Tambah ' }}
                    @endif
                    Kriteria
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
                    @if (isset($kriteria))
                        {!! Form::model($kriteria, ['method' => 'put', 'class' => 'form-horizontal']) !!}
                    @else
                        {!! Form::open(['class' => 'form-horizontal']) !!}
                    @endif
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-md-4">Nama Kriteria</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kriteria" value="{{ isset($kriteria) ? $kriteria->name_kriteria : '' }}">
                        </div>
                    </div>
                    <a href="{{ url('/kriteria') }}" class="btn btn-secondary float-left"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                    <button class="btn btn-info float-right" type="submit"><i class="mdi mdi-content-save"></i> Simpan</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection