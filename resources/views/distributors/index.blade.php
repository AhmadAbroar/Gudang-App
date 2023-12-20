@extends('layouts.app')

@section('title', 'Data Distributor')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">@yield('title')</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                        <a href="{{ route('distributors.create') }}" type="button" class="btn btn-outline-primary">+ Tambah
                            Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($distributors as $distributor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $distributor->nama_distributor }}</td>
                                            <td>{{ $distributor->alamat_distributor }}</td>
                                            <td>{{ $distributor->telp_distributor }}</td>
                                            <td>
                                                <a href="{{ route('distributors.edit', $distributor->id_distributor) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form
                                                    action="{{ route('distributors.destroy', $distributor->id_distributor) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
