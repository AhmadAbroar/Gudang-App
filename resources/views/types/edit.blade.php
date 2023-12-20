@extends('layouts.app')

@section('title', 'Edit Data Type')

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
                        <a href="{{ url('types') }}" type="button" class="btn btn-outline-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('types.update', $type->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="id_merek">Merek:</label>
                                    <select name="id_merek" class="form-control @error('id_merek') is-invalid @enderror" required>
                                        <option value="">Select Merek</option>
                                        @foreach ($mereks as $merek)
                                            <option value="{{ $merek->id }}" {{ $type->id_merek == $merek->id ? 'selected' : '' }}>{{ $merek->nama_merek }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_merek')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="nama_type">Name:</label>
                                    <input type="text" name="nama_type" class="form-control @error('nama_type') is-invalid @enderror" value="{{ $type->nama_type }}" required>
                                    @error('nama_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="tahun_rilis">Release Year:</label>
                                    <input type="number" name="tahun_rilis" class="form-control @error('tahun_rilis') is-invalid @enderror" value="{{ $type->tahun_rilis }}" required>
                                    @error('tahun_rilis')
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
    </div>
@endsection
