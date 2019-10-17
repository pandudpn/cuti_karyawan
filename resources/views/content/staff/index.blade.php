@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data Staff</h3>
                <div class="col-md-6 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <h5 class="text-center">{{ session('success') }}</h5>
                        </div>
                    @endif
                </div>
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Role</center>
                            </th>
                            <th>
                                <center>Name</center>
                            </th>
                            <th>
                                <center>Phone</center>
                            </th>
                            <th>
                                <center>Email</center>
                            </th>
                            <th>
                                <center>Total Cuti</center>
                            </th>
                            <th>
                                <center>Actions</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($staff as $data)
                            <tr>
                                <td>
                                    <center>{{ $no++ }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->role_name }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->name }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->phone }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->email }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->total_cuti }}</center>
                                </td>
                                <td>
                                    <center>
                                        <form action="{{ url('/staff/delete/'.$data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ url('/staff/edit/'.$data->id) }}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i> Edit</a>
                                            <button class="btn btn-danger btn-sm" type="submit"><i class="mdi mdi-delete"></i> Delete</button>
                                        </form>
                                    </center>
                                </td>
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
                    sLengthMenu: '_MENU_ Data Per Halaman <a href={{ url("/staff/new") }} class="btn btn-info btn-sm">New Staff</a>'
                }
            })
        })
    </script>
@endsection