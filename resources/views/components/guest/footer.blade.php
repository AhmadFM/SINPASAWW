{{-- resources/views/components/guest/footer.blade.php --}}
<footer id="footer" class="bg-[#F4F4EF] text-[#007E43]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[1.3fr_0.5fr_0.5fr] gap-10">

            {{-- Tentang ── --}}
            <div class="sm:col-span-2 lg:col-span-1">
                <h3 class="font-manrope font-bold text-xl mb-4 uppercase" style="font-family:'Manrope',sans-serif;">
                    Pasar Sinpasa
                </h3>
                <p class="text-[#121212] text-sm leading-relaxed mb-4">
                    Pasar Modern Sinpasa Summarecon Bandung hadir untuk melayani kebutuhan
                    dari warga, penghuni dan pengunjung Summarecon Bandung.
                </p>
                <p class="text-[#121212] text-sm">📞 +62 895-1230-0903</p>
                <p class="text-[#121212] text-sm mt-1">✉️ sinpasasummareconbdg@gmail.com</p>
            </div>

            {{-- Informasi ── --}}
            <div>
                <h4 class="font-bold font-[manrope] mb-4 text-sm uppercase tracking-widest text-[#007E43]">Informasi</h4>
                <div class="space-y-2">
                    <a href="{{ route('guest.snk') }}"
                       class="block text-sm text-[#121212] hover:text-[#121212]/30 transition-colors">
                        Syarat &amp; Ketentuan
                    </a>
                    <a href="{{ route('guest.privasi') }}"
                       class="block text-sm text-[#121212] hover:text-[#121212]/30 transition-colors">
                        Kebijakan Privasi
                    </a>
                </div>
            </div>

            {{-- Sosial ── --}}
            <div>
                <h4 class="font-semibold mb-4 text-sm uppercase tracking-widest text-[#007E43]">Ikuti Kami</h4>
                <div class="flex items-center gap-4">
                    <a href="https://www.instagram.com/pasarsinpasabandung/"
                       target="_blank" rel="noopener"
                       class="w-10 h-10 rounded-full bg-[#E8E8E3] hover:bg-white/40 flex items-center justify-center transition-colors"
                       aria-label="Instagram Pasar Sinpasa">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                        </svg>
                    </a>
                    <a href="https://www.tiktok.com/@pasarsinpasabandung"
                       target="_blank" rel="noopener"
                       class="w-10 h-10 rounded-full bg-[#E8E8E3] hover:bg-white/40 flex items-center justify-center transition-colors"
                       aria-label="TikTok Pasar Sinpasa">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.17 8.17 0 004.77 1.52V6.75a4.85 4.85 0 01-1-.06z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-xs text-[#121212]">
            © {{ date('Y') }} Pasar Sinpasa Summarecon Bandung. All rights reserved.
        </div>
    </div>
</footer>
