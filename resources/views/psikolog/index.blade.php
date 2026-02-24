@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold">Dashboard Psikolog</h1>
    <p>Selamat datang, {{ auth()->user()->nama_lengkap }}</p>
</div>
@endsection