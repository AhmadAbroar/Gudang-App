@extends('layouts.app')

@section('title', 'Dashboard')

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
                    <div class="card-body">
                        <h3>Selamat datang <span class="text-primary">{{ Auth::user()->name }}</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
