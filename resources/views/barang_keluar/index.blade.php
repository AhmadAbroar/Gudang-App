@extends('layouts.app')

@section('title', 'Data Barang Keluar')

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
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('barang-keluar.report') }}" class="btn btn-success">Cetak Laporan</a>
                        @else
                            <a href="{{ route('barang-keluar.create') }}" type="button" class="btn btn-outline-primary">+
                                Tambah
                                Data</a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangKeluars as $barangKeluar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barangKeluar->user->name }}</td>
                                            <td>{{ $barangKeluar->barang->nama_barang }}</td>
                                            <td>{{ $barangKeluar->jumlah }}</td>
                                            <td>{{ $barangKeluar->tanggal }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $barangKeluars->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
