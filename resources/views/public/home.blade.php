@extends('layouts.app')

@section('content')

<x-navbar />

<x-hero
    :konten="$kontenTerbaru"
/>

<x-fasilitas />

<x-denah-preview />

<x-footer />

@endsection
