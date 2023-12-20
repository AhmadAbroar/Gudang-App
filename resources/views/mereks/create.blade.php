@extends('layouts.app')

@section('title', 'Tambah Data Merek')

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
                        <a href="{{ url('mereks') }}" type="button" class="btn btn-outline-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('mereks.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_merek">Name:</label>
                                    <input type="text" name="nama_merek" class="form-control @error('nama_merek') is-invalid @enderror" value="{{ old('nama_merek') }}" required>
                                    @error('nama_merek')
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
