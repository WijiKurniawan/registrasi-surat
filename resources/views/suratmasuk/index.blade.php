@extends('master')

@section('title', 'Surat Masuk')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="mb-3">
        <a type="button" class="btn btn-primary btn-sm" href="{{ url('suratmasuk/create') }}">Tambah</a>
        {{-- <a type="button" class="btn btn-primary btn-sm">Tambah</a> --}}

    </div>
@endsection
