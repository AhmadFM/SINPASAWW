@extends('layouts.app')

@section('content')

<x-navbar />

<section class="py-10">

    <div class="container mx-auto">

        <h1 class="text-4xl font-bold text-center">
            Denah Interaktif
        </h1>

        <div class="overflow-auto mt-8">

            @include('public.denah.svg')

        </div>

    </div>

</section>

<x-footer />

@endsection
