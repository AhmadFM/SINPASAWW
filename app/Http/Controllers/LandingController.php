<?php

namespace App\Http\Controllers;
use App\Models\Konten;
use App\Models\Review;

class LandingController extends Controller
{
    //
    public function index()
    {
        return view('public.home', [
            'kontenTerbaru' => Konten::latest()->first(),
            'testimoni' => Review::latest()->take(6)->get()
        ]);
    }
    public function show($id)
    {
        $konten = Konten::findOrFail($id);

        return view('public.konten.show', compact('konten'));
    }
}

