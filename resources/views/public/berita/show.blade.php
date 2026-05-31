@extends('layouts.app')

@section('content')

<x-navbar />

<section class="max-w-6xl mx-auto px-4 py-12">

    <img
        src="{{ asset('storage/'.$konten->gambar) }}"
        alt="{{ $konten->judul }}"
        class="w-full rounded-xl mb-8"
    >

    <span class="text-green-700 font-medium">
        Berita
    </span>

    <h1 class="text-4xl font-bold mt-3">
        {{ $konten->judul }}
    </h1>

    <div class="prose max-w-none mt-8">
        {!! $konten->isi !!}
    </div>

</section>

<x-footer />

@endsection
