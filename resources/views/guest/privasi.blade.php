{{-- resources/views/guest/privasi.blade.php --}}
@extends('layouts.guest')

@section('title', 'Kebijakan Privasi – Pasar Modern Sinpasa')

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

    <h1>Kebijakan Privasi</h1>

    <div class="article">
        <p>Terakhir diperbarui: 1 April 2026</p>

        <p>
            Kami menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi
            yang Anda berikan saat menggunakan layanan kami.
        </p>

        <p><strong>1. Informasi yang Dikumpulkan</strong></p>
        <p>Kami dapat mengumpulkan informasi berikut:</p>
        <p>— Data penggunaan (aktivitas dalam platform)</p>
        <p>— Informasi perangkat dan browser</p>

        <p><strong>2. Penggunaan Informasi</strong></p>
        <p>Data yang dikumpulkan digunakan untuk:</p>
        <p>— Menyediakan dan mengelola layanan</p>
        <p>— Meningkatkan pengalaman pengguna</p>

        <p><strong>3. Perlindungan Data</strong></p>
        <p>
            Kami menerapkan langkah-langkah keamanan untuk melindungi data dari akses
            tidak sah, perubahan, atau pengungkapan.
        </p>

        <p><strong>4. Pembagian Informasi</strong></p>
        <p>
            Kami tidak menjual data pribadi pengguna. Informasi hanya dapat dibagikan
            kepada pihak ketiga jika diperlukan untuk operasional layanan atau diwajibkan
            oleh hukum.
        </p>

        <p><strong>5. Cookie</strong></p>
        <p>
            Kami menggunakan cookie untuk meningkatkan pengalaman pengguna, termasuk
            menyimpan preferensi dan analisis penggunaan.
        </p>

        <p><strong>6. Hak Pengguna</strong></p>
        <p>Pengguna berhak untuk:</p>
        <p>— Mengakses data pribadi</p>
        <p>— Memperbaiki atau memperbarui data</p>
        <p>— Meminta penghapusan data</p>

        <p><strong>7. Perubahan Kebijakan</strong></p>
        <p>
            Kebijakan privasi ini dapat diperbarui sewaktu-waktu. Perubahan akan
            diinformasikan melalui halaman ini.
        </p>

        <p style="margin-top:2rem;">
            <a href="{{ route('guest.index') }}"
               class="text-sm font-medium hover:underline"
               style="color:#007E43;">← Kembali ke Beranda</a>
        </p>
    </div>
</div>
@endsection
