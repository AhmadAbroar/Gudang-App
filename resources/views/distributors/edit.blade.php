@extends('layouts.app')

@section('title', 'Edit Data Distributor')

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
                        <a href="{{ url('distributors') }}" type="button" class="btn btn-outline-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('distributors.update', $distributor->id_distributor) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_distributor">Name:</label>
                                <input type="text" name="nama_distributor" class="form-control @error('nama_distributor') is-invalid @enderror" value="{{ $distributor->nama_distributor }}" required>
                                @error('nama_distributor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="alamat_distributor">Address:</label>
                                <textarea name="alamat_distributor" class="form-control @error('alamat_distributor') is-invalid @enderror" required>{{ $distributor->alamat_distributor }}</textarea>
                                @error('alamat_distributor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="telp_distributor">Phone:</label>
                                <input type="text" name="telp_distributor" class="form-control @error('telp_distributor') is-invalid @enderror" value="{{ $distributor->telp_distributor }}" required>
                                @error('telp_distributor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
