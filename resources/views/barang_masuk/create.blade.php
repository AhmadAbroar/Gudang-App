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
                        <a href="{{ url('barang-masuk') }}" type="button" class="btn btn-outline-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('barang-masuk.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id_user">User:</label>
                                <input type="text" name="id_user" class="form-control" value="{{ auth()->user()->name }}"
                                    readonly>
                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                            </div>
                            <div class="form-group mt-2">
                                <label for="id_distributor">Distributor:</label>
                                <select name="id_distributor" class="form-control">
                                    @foreach ($distributors as $distributor)
                                        <option value="{{ $distributor->id_distributor }}">
                                            {{ $distributor->nama_distributor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="id_barang">Barang:</label>
                                <select name="id_barang" class="form-control">
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="jumlah">Jumlah:</label>
                                <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}"
                                    required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
