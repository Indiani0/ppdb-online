@extends('layouts.app')
<x-layout>
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-primary">Hello {{ ucwords(Auth::user()->name) }}</h1>
                    <p>Selamat Datang di menu admin, silahkan eksplorasi menu yang tersedia!</p>
                </div>
            </div>
        </div>
    @endsection
</x-layout>
