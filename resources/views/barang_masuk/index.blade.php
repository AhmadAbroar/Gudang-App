@extends('layouts.app')

@section('title', 'Data Barang Masuk')

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
                            <a href="{{ route('barang-masuk.report') }}" class="btn btn-success">Cetak Laporan</a>
                        @else
                            <a href="{{ route('barang-masuk.create') }}" type="button" class="btn btn-outline-primary">+
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
                                        <th>Pegawai</th>
                                        <th>Distributor</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangMasuks as $barangMasuk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barangMasuk->user->name }}</td>
                                            <td>{{ $barangMasuk->distributor->nama_distributor }}</td>
                                            <td>{{ $barangMasuk->barang->nama_barang }}</td>
                                            <td>{{ $barangMasuk->jumlah }}</td>
                                            <td>{{ $barangMasuk->tanggal }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $barangMasuks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
