@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data Supplier</h3>
                <div class="col-md-8 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <h5 class="text-center">{{ session('success') }}</h5>
                        </div>
                    @endif
                </div>
                <table class="table table-hover" id="tableSupplier">
                    <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Nama</center>
                            </th>
                            <th>
                                <center>Nomer Telp</center>
                            </th>
                            <th>
                                <center>Alamat</center>
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
                        @foreach ($supplier as $data)
                            <tr>
                                <td>
                                    <center>{{ $no++ }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->name_supplier }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->no_telp }}</center>
                                </td>
                                <td>
                                    <center>{{ $data->alamat }}</center>
                                </td>
                                <td>
                                    <center>
                                        <form action="{{ url('/supplier/delete/'.$data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ url('/supplier/edit/'.$data->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil-box-outline"></i> Edit</a>
                                            <button class="btn btn-danger btn-sm" type="submit"><i class="mdi mdi-delete-circle"></i> Delete</button>
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
            $('#tableSupplier').DataTable({
                oLanguage: {
                    sLengthMenu: '_MENU_ Data Per Halaman <a href={{ url("/supplier/create") }} class="btn btn-info btn-sm">Tambah</a>'
                }
            });
        })
    </script>
@endsection