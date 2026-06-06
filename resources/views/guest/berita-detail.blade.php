{{-- resources/views/guest/berita-detail.blade.php --}}
@extends('layouts.guest')

@section('title', $konten->judul . ' – Pasar Modern Sinpasa')

@section('styles')
<style>
/* ── Article layout ──────────────────────────────── */
.article-hero {
    width:100%; aspect-ratio:16/9; object-fit:cover;
    border-radius:16px;
}
.article-hero-placeholder {
    width:100%; aspect-ratio:16/9;
    background:linear-gradient(135deg,#E6F6EE,#c6ebd9);
    border-radius:16px; display:flex; align-items:center; justify-content:center;
}
.article-body p    { color:#374151; line-height:1.9; margin-bottom:1.1rem; font-size:15px; }
.article-body h2   { font-family:'Manrope',sans-serif; font-size:1.25rem; font-weight:800; color:#003B1F; margin:1.5rem 0 .5rem; }
.article-body h3   { font-family:'Manrope',sans-serif; font-size:1.05rem; font-weight:700; color:#003B1F; margin:1.2rem 0 .4rem; }
.article-body strong { color:#1a1a1a; }

/* ── Related card ─────────────────────────────────── */
.related-card {
    display:flex; gap:12px; padding:12px; border-radius:12px;
    background:#fff; border:1px solid #f0f0f0;
    text-decoration:none; transition:box-shadow .15s;
}
.related-card:hover { box-shadow:0 4px 16px rgba(0,0,0,.08); }
.related-card img  { width:80px; height:60px; object-fit:cover; border-radius:8px; flex-shrink:0; }

/* ── Info page layout (snk/privasi) ────────────────── */
.info-page-wrap {
    max-width:800px; margin:0 auto; padding:3rem 1.5rem 5rem;
}
</style>
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
    <div class="flex flex-col lg:flex-row gap-10">

        {{-- ════════════════════════════════════════════
             KIRI: Artikel utama
        ════════════════════════════════════════════ --}}
        <article class="flex-1 min-w-0">

            {{-- Breadcrumb ── --}}
            <div class="flex items-center gap-2 text-xs text-black mb-4">
                <a href="{{ route('guest.index') }}" class="hover:text-[#007E43] transition-colors">Beranda</a>
                <span>›</span>
                <span class="text-gray-600">{{ $konten->judul }}</span>
            </div>

            {{-- Kategori + Tanggal ── --}}
            <div class="flex items-center gap-3 mb-4">
                <span class="kategori-pill">{{ strtoupper($konten->kategori) }}</span>
                <span class="text-xs text-gray-400">
                    {{ $konten->created_at->translatedFormat('d F Y') }}
                </span>
            </div>

            {{-- Judul ── --}}
            <h1 class="font-manrope font-black text-2xl lg:text-4xl text-black leading-tight mb-6"
                style="font-family:'Manrope',sans-serif;">
                {{ $konten->judul }}
            </h1>

            {{-- Hero image ── --}}
            @if ($konten->img_url)
                <img src="{{ asset('storage/' . $konten->img_url) }}"
                     alt="{{ $konten->judul }}"
                     class="article-hero mb-8">
            @else
                <div class="article-hero-placeholder mb-8">
                    <svg class="w-16 h-16 text-green-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            @endif

            {{-- Deskripsi / Isi artikel ── --}}
            {{-- Konten disimpan sebagai plain text di kolom deskripsi.
                 nl2br() mengubah newline jadi <br> agar paragraf tampil rapi. --}}
            <div class="article-body prose max-w-none">
                {!! nl2br(e($konten->deskripsi)) !!}
            </div>

            {{-- Share / back ── --}}
            <div class="flex items-center justify-between mt-10 pt-6 border-t border-gray-100">
                <a href="{{ route('guest.index') }}"
                   class="flex items-center gap-2 text-sm text-gray-500 hover:text-[#007E43] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Beranda
                </a>
                <span class="text-xs text-gray-400">
                    Diterbitkan {{ $konten->created_at->translatedFormat('d M Y') }}
                </span>
            </div>
        </article>

        {{-- ════════════════════════════════════════════
             KANAN: Artikel terkait (sidebar)
        ════════════════════════════════════════════ --}}
        @if ($kontenLain->count())
        <aside class="w-full lg:w-72 xl:w-80 shrink-0">
            <div class="sticky top-24">
                <h3 class="font-manrope font-bold text-[#003B1F] mb-4 text-base"
                    style="font-family:'Manrope',sans-serif;">Berita Terkait</h3>
                <div class="space-y-3">
                    @foreach ($kontenLain as $k)
                    <a href="{{ route('guest.berita', $k->konten_id) }}" class="related-card">
                        @if ($k->img_url)
                            <img src="{{ asset('storage/' . $k->img_url) }}" alt="{{ $k->judul }}">
                        @else
                            <div class="w-20 h-15 rounded-lg bg-green-50 shrink-0 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/>
                                </svg>
                            </div>
                        @endif
                        <div class="min-w-0">
                            <span class="text-[10px] font-bold uppercase tracking-wide"
                                  style="color:var(--yellow-dark);">{{ $k->kategori }}</span>
                            <p class="text-xs font-semibold text-gray-800 line-clamp-2 leading-snug mt-0.5">
                                {{ $k->judul }}
                            </p>
                            <p class="text-[10px] text-gray-400 mt-1">
                                {{ $k->created_at->translatedFormat('d M Y') }}
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </aside>
        @endif

    </div>
</div>
@endsection
