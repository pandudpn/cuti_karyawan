@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{ $title }}
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
                    @if (isset($staff))
                        {!! Form::model($staff, ['method' => 'put', 'class' => 'form-horizontal']) !!}
                    @else
                        {!! Form::open(['class' => 'form-horizontal']) !!}
                    @endif
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-md-4">Role Staff</label>
                        <div class="col-md-8">
                            <select name="role" id="role" class="form-control" required="required">
                                <option value="" selected disabled>-</option>
                                @foreach ($role as $row)
                                    <option value="{{ $row->id }}" {{ isset($staff) ? $staff->role_id == $row->id ? 'selected' : null : null }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-md-4">Staff Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Staff Name" value="{{ isset($staff) ? $staff->name : '' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-form-label col-md-4">Phone</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number of Staff" value="{{ isset($staff) ? $staff->phone : '' }}" required>
                        </div>
                    </div>
                    @if (empty($staff))
                        <div class="form-group row">
                            <label for="email" class="col-form-label col-md-4">Email</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-form-label col-md-4">Password</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="************" required>
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <label for="total" class="col-form-label col-md-4">Total Cuti</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="total" name="total" placeholder="0 Cuti" value="{{ $staff->total_cuti }}">
                            </div>
                        </div>
                    @endif
                    <a href="{{ url('/staff') }}" class="btn btn-secondary float-left"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                    <button class="btn btn-primary float-right"><i class="mdi mdi-content-save"></i> Simpan</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection