@extends('layouts.app')

@section('title', 'Tambah Data Barang')

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
                        <a href="{{ url('barangs') }}" type="button" class="btn btn-outline-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="id_merek">Merek:</label>
                                    <select name="id_merek" class="form-control @error('id_merek') is-invalid @enderror" required>
                                        <option value="" hidden>Select Merek</option>
                                        @foreach ($mereks as $merek)
                                            <option value="{{ $merek->id }}" {{ old('id_merek') == $merek->id ? 'selected' : '' }}>{{ $merek->nama_merek }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_merek')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="id_type">Type:</label>
                                    <select name="id_type" class="form-control @error('id_type') is-invalid @enderror" required>
                                        <option value="" hidden>Select Type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" {{ old('id_type') == $type->id ? 'selected' : '' }}>{{ $type->nama_type }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="nama_barang">Name:</label>
                                    <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" required>
                                    @error('nama_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="stok">Stock:</label>
                                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" required>
                                    @error('stok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="foto">Photo:</label>
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success mt-2">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
