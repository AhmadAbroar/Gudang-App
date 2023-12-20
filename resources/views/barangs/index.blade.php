@extends('layouts.app')

@section('title', 'Data Barang')

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
                        <a href="{{ route('barangs.create') }}" type="button" class="btn btn-outline-primary">+ Tambah
                            Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Merek</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangs as $barang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barang->merek->nama_merek }}</td>
                                            <td>{{ $barang->type->nama_type }}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->stok }}</td>
                                            <td>
                                                @if ($barang->foto)
                                                    <img src="{{ asset('storage/'.$barang->foto) }}" alt="Barang Photo" style="max-width: 100px;">
                                                @else
                                                    No Photo
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
