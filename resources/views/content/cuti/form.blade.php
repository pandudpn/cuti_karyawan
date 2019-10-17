@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{ $title }}
                </h3>
                @if (isset($cuti))
                    {!! Form::model($cuti, ['method' => 'put', 'class' => 'form-horizontal']) !!}
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
                        <label for="from" class="col-form-label col-md-4">From Date</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control date" id="from" name="from" placeholder="YYYY-MM-DD" value="{{ isset($cuti) ? $cuti->from : '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="to" class="col-form-label col-md-4">End Date</label>
                        <div class="col-md-8">
                                <input type="text" class="form-control date" id="to" name="to" placeholder="YYYY-MM-DD" value="{{ isset($cuti) ? $cuti->to : '' }}">
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

@section('script')
    <script>
        $(document).ready(function(){
            $('.date').datetimepicker({
                format: 'Y-m-d',
                timepicker: false,
                autoclose: true
            });
        });
    </script>
@endsection