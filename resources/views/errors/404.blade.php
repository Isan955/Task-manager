@extends('layouts.main')

@section('title', 'Page Not Found')

@section('content')
    <div class="error-page">
        <h1>404</h1>
        <h3>Oops! Page not found.</h3>
        <p>Maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
        <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>
    </div>
@endsection
