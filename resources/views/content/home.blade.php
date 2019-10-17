@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Sistem Informasi Cuti Karyawan</h3>
                <p>
                    Total Cuti kamu adalah <b>{{ $staff->total_cuti }}</b>
                </p>
            </div>
        </div>
    </div>
@endsection