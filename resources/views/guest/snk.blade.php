{{-- resources/views/guest/snk.blade.php --}}
@extends('layouts.guest')

@section('title', 'Syarat & Ketentuan – Pasar Modern Sinpasa')

@section('styles')
<style>
.info-content { max-width:760px; margin:0 auto; padding:3.5rem 1.5rem 5rem; }
.info-label   { display:inline-block; font-size:12px; font-weight:700; letter-spacing:.08em;
                text-transform:uppercase; color:#925800; margin-bottom:1rem; }
.info-content h1 { font-family:'Manrope',sans-serif; font-size:clamp(1.8rem,4vw,2.75rem);
                   font-weight:800; color:#121212; letter-spacing:-.02em; line-height:1.15; margin-bottom:2rem; }
.article p    { color:#121212; line-height:1.85; margin-bottom:.9rem; font-size:15px; }
.article p strong { color:#121212; }
</style>
@endsection

@section('content')
<div class="info-content">

    <span class="info-label">Informasi</span>

    <h1>Syarat dan Ketentuan</h1>

    <div class="article">
        <p>Terakhir diperbarui: 1 April 2026</p>

        <p>
            Dengan mengakses dan menggunakan layanan kami, Anda dianggap telah membaca,
            memahami, dan menyetujui seluruh syarat dan ketentuan berikut.
        </p>

        <p><strong>1. Penggunaan Layanan</strong></p>
        <p>
            Pengguna setuju untuk menggunakan platform ini hanya untuk tujuan yang sah
            dan tidak melanggar hukum yang berlaku. Segala aktivitas yang merugikan sistem
            atau pengguna lain dilarang.
        </p>

        <p><strong>2. Informasi Produk</strong></p>
        <p>
            Kami berusaha menyajikan informasi produk secara akurat. Namun, kami tidak
            menjamin bahwa semua informasi bebas dari kesalahan atau selalu terbaru.
        </p>

        <p><strong>3. Perubahan Layanan</strong></p>
        <p>
            Kami berhak untuk mengubah, menambah, atau menghentikan sebagian atau seluruh
            layanan tanpa pemberitahuan sebelumnya.
        </p>

        <p><strong>4. Batasan Tanggung Jawab</strong></p>
        <p>
            Kami tidak bertanggung jawab atas kerugian yang timbul akibat penggunaan
            layanan, termasuk namun tidak terbatas pada kesalahan data atau gangguan sistem.
        </p>

        <p><strong>5. Hak Kekayaan Intelektual</strong></p>
        <p>
            Seluruh konten dalam platform ini dilindungi oleh hukum yang berlaku dan tidak
            boleh digunakan tanpa izin.
        </p>

        <p><strong>6. Perubahan Ketentuan</strong></p>
        <p>
            Syarat &amp; ketentuan dapat diperbarui sewaktu-waktu. Pengguna disarankan untuk
            memeriksa halaman ini secara berkala.
        </p>

        <p style="margin-top:2rem;">
            <a href="{{ route('guest.index') }}"
               class="text-sm font-medium hover:underline"
               style="color:#007E43;">← Kembali ke Beranda</a>
        </p>
    </div>
</div>
@endsection
