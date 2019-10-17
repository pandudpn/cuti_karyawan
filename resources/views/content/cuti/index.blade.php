@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Submission Cuti</h3>
                <div class="col-md-8 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <h5 class="text-center">{{ session('success') }}</h5>
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            <h5 class="text-center">{{ session('error') }}</h5>
                        </div>
                    @endif
                </div>
                <table class="table table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            @if (session('role') != 3)
                                <th>
                                    <center>Staff Name</center>
                                </th>
                            @endif
                            <th>
                                <center>From</center>
                            </th>
                            <th>
                                <center>To</center>
                            </th>
                            <th>
                                <center>Total</center>
                            </th>
                            <th>
                                <center>Status</center>
                            </th>
                            @if (session('role') != 3)
                                <th>
                                    <center>Action</center>
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($cuti as $data)
                            <tr>
                                <td>
                                    <center>{{ $no++ }}</center>
                                </td>
                                @if (session('role') != 3)
                                    <td>
                                        <center>{{ $data->staff_name }}</center>
                                    </td>
                                @endif
                                <td>
                                    <center>{{ date('d F Y', strtotime($data->from)) }}</center>
                                </td>
                                <td>
                                        <center>{{ date('d F Y', strtotime($data->to)) }}</center>
                                </td>
                                <td>
                                    <center>{{ date_diff(date_create($data->to), date_create($data->from))->d. ' hari' }}</center>
                                </td>
                                <td>
                                    <center>
                                        @if ($data->status == 'waiting')
                                            <span class="badge badge-dark">Waiting to Approve</span>
                                        @elseif($data->status == 'accept')
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </center>
                                </td>
                                @if (session('role') != 3)
                                    @if ($data->status == 'waiting')
                                        <td>
                                            <center>
                                                <a href="{{ url('/cuti/approve/'.$data->id) }}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i> Approve</a>
                                                <a href="{{ url('/cuti/reject/'.$data->id) }}" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i> Reject</a>
                                            </center>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.alert').delay(5000).fadeOut('slow');
            $('#table').DataTable({
                oLanguage: {
                    sLengthMenu: '_MENU_ Data Per Halaman <a href={{ url("/cuti/new") }} class="btn btn-info btn-sm">Ajukan Cuti Baru</a>'
                },
                scrollX: true
            });
        })
    </script>
@endsection