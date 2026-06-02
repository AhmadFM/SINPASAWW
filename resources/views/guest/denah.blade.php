{{-- resources/views/guest/denah.blade.php --}}
@extends('layouts.guest')

@section('title', 'Denah Pasar – Pasar Modern Sinpasa')

@section('styles')
<style>
/* ── Denah container ────────────────────────────── */
.denah-wrap {
    width:100%; overflow:auto; border-radius:16px;
    background:#D9D9D9; position:relative;
    max-height:75vh; min-height:300px;
    border:1px solid #e5e7eb;
    cursor:grab;
}
.denah-wrap:active { cursor:grabbing; }

.denah-wrap svg {
    width:100%; min-width:700px;
    transform-origin:top left;
    transition:transform .2s ease;
    display:block;
}

/* ── Lapak hover ─────────────────────────────────── */
.denah-wrap svg [class]:not(.galeri-dekranasda):not(.area-pengelola) {
    cursor:pointer; transition:opacity .15s, filter .1s;
}
.denah-wrap svg [class]:not(.galeri-dekranasda):not(.area-pengelola):hover {
    opacity:.75; filter:brightness(1.1);
}
.lapak-dimmed { opacity:.2 !important; }

/* ── Info card (klik lapak) ──────────────────────── */
.info-card {
    position:fixed; bottom:-100%; left:50%; transform:translateX(-50%);
    width:min(380px, 95vw); background:#fff; border-radius:20px 20px 0 0;
    box-shadow:0 -4px 30px rgba(0,0,0,.15); z-index:100;
    transition:bottom .35s cubic-bezier(.4,0,.2,1);
    overflow:hidden;
}
.info-card.show { bottom:0; }

/* Desktop: tampilkan sebagai panel kanan */
@media (min-width:768px) {
    .info-card {
        position:fixed; bottom:auto; left:auto;
        top:50%; right:1.5rem; transform:translateY(-50%);
        border-radius:16px;
        box-shadow:0 8px 40px rgba(0,0,0,.15);
        transition:opacity .2s, transform .2s;
        opacity:0; transform:translateY(-50%) translateX(20px);
        pointer-events:none;
    }
    .info-card.show {
        opacity:1; transform:translateY(-50%) translateX(0);
        pointer-events:auto;
    }
}

.info-card-image { position:relative; }
.info-card-image img { width:100%; height:160px; object-fit:cover; }
.info-badge {
    position:absolute; bottom:10px; left:12px;
    padding:3px 10px; border-radius:999px;
    font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:.06em;
    background:rgba(0,0,0,.55); color:#fff; backdrop-filter:blur(4px);
}
.info-card-body { padding:1rem 1.25rem 1.5rem; }
.info-id { font-size:11px; color:#9ca3af; font-family:monospace; margin-bottom:2px; }
.info-title { font-family:'Manrope',sans-serif; font-size:1.1rem; font-weight:800; color:#1a1a1a; line-height:1.2; margin-bottom:.4rem; }
.info-desc { font-size:13px; color:#6b7280; line-height:1.5; margin-bottom:1rem; }

/* ── Legend ──────────────────────────────────────── */
.legend-item {
    display:flex; align-items:center; gap:8px; cursor:pointer;
    padding:5px 10px; border-radius:999px; transition:background .15s;
    font-size:12px; color:#374151;
}
.legend-item:hover { background:#f3f4f6; }
.legend-item.active { background:#E6F6EE; color:#007E43; font-weight:600; }
.legend-dot { width:12px; height:12px; border-radius:3px; flex-shrink:0; }

/* ── Zoom controls ───────────────────────────────── */
.zoom-btn {
    display:flex; align-items:center; justify-content:center; gap:6px;
    padding:8px 16px; border-radius:999px; border:1.5px solid #e5e7eb;
    background:#fff; font-size:13px; font-weight:500; color:#374151;
    cursor:pointer; transition:all .15s; white-space:nowrap;
}
.zoom-btn:hover { border-color:#007E43; color:#007E43; }
</style>
@endsection

@section('content')

{{-- ── Page header ── --}}
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-4 text-center">
    <h1 class="font-manrope font-black text-2xl lg:text-4xl text-[#003B1F] mb-2"
        style="font-family:'Manrope',sans-serif;">Denah Pasar</h1>
    <p class="text-gray-500 text-sm lg:text-base max-w-lg mx-auto">
        Gunakan denah interaktif kami untuk menemukan tenant yang dicari lebih cepat.
    </p>
</div>

{{-- ── Zoom controls ── --}}
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-3">
    <div class="flex items-center justify-end gap-2">
        <button id="btn-zoom-in"    class="zoom-btn">+ Perbesar</button>
        <button id="btn-zoom-reset" class="zoom-btn">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Reset
        </button>
        <button id="btn-zoom-out"   class="zoom-btn">− Perkecil</button>
    </div>
</div>

{{-- ── Denah map container ── --}}
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
    <div class="denah-wrap" id="denahContainer">
        {{-- EMBEDDED SVG dari denah.html asli --}}
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 2132 1032" fill="none" id="denahSvg">
            @include('components.guest.denah-svg')
        </svg>
    </div>
</div>

{{-- ── Legend / Filter ── --}}
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
    <div class="flex flex-wrap gap-2">
        @foreach ([
            ['all',                              '#374151', 'Semua Lapak'],
            ['kios-besar',                       '#4B7AA8', 'Kios Besar'],
            ['kios-kecil',                       '#2C85B1', 'Kios Kecil'],
            ['kios-fnb',                         '#589A67', 'Kios F&B/Kuliner'],
            ['lapak-sayur-buah-dan-jajanan',     '#25C54E', 'Lapak Sayur & Buah'],
            ['lapak-non-halal',                  '#C36D8A', 'Lapak Non-Halal'],
            ['lapak-basah',                      '#DED24D', 'Lapak Basah'],
            ['lapak-olahan-dan-jajanan',         '#EB8946', 'Lapak Olahan & Jajanan'],
            ['lapak-kuliner',                    '#FF4F3B', 'Pojok Kuliner'],
            ['galeri-dekranasda',                '#ABA08E', 'Galeri Dekranasda'],
            ['mushola',                          '#8E9176', 'Mushola'],
            ['atm',                              '#827E8E', 'ATM Center'],
            ['toilet',                           '#A78A85', 'Toilet'],
        ] as [$filter, $warna, $label])
            <button class="legend-item {{ $filter === 'all' ? 'active' : '' }}"
                    data-filter="{{ $filter }}">
                <span class="legend-dot" style="background:{{ $warna }};"></span>
                {{ $label }}
            </button>
        @endforeach
    </div>
</div>

{{-- ── Info card popup (click on lapak) ── --}}
<div id="infoCard" class="info-card" role="dialog" aria-label="Info Lapak">
    <div class="info-card-image">
        <img id="infoImage" src="{{ asset('images/default-lapak.jpg') }}" alt="Foto Tenant"
             onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'380\' height=\'160\' viewBox=\'0 0 380 160\'%3E%3Crect fill=\'%23E6F6EE\' width=\'380\' height=\'160\'/%3E%3C/svg%3E';">
        <span id="infoBadge" class="info-badge">KATEGORI</span>
        <button id="infoClose"
                class="absolute top-3 right-3 w-7 h-7 flex items-center justify-center bg-black/50 text-white rounded-full text-lg leading-none hover:bg-black/70 transition-colors">
            ×
        </button>
    </div>
    <div class="info-card-body">
        <p id="infoId" class="info-id">L000</p>
        <h2 id="infoTitle" class="info-title">Nama Toko</h2>
        <p id="infoDesc" class="info-desc">Deskripsi toko akan muncul di sini.</p>
        <a href="#" id="infoLink"
           class="btn-primary-guest w-full justify-center text-sm py-2.5 hidden"
           style="font-size:13px; padding:10px 20px; display:none;">
            Kunjungi Profil Toko
        </a>
    </div>
</div>

{{-- Overlay penutup info card di mobile --}}
<div id="infoOverlay" class="fixed inset-0 bg-black/30 z-50 hidden md:hidden" onclick="closeInfoCard()"></div>

{{-- ── Tenant data dari database (JSON inline untuk JS) ── --}}
<script id="tenantData" type="application/json">
    @json($denahTenants)
</script>
@endsection

@section('scripts')
<script>
(function () {
    /* ── Data tenant dari DB ── */
    const tenantData = JSON.parse(document.getElementById('tenantData').textContent || '{}');

    /* ── Kategori → gambar default ── */
    const imgMap = {
        sayur:    '{{ asset("images/sayuran.png") }}',
        basah:    '{{ asset("images/daging.png") }}',
        olahan:   '{{ asset("images/jajanan.png") }}',
        'non-halal': '{{ asset("images/nonhalal.png") }}',
        fnb:      '{{ asset("images/kuliner.png") }}',
        kuliner:  '{{ asset("images/kuliner.png") }}',
        default:  '{{ asset("images/default-lapak.jpg") }}',
    };

    function getImg(kategori) {
        if (!kategori) return imgMap.default;
        const k = kategori.toLowerCase();
        if (k.includes('sayur') || k.includes('buah')) return imgMap.sayur;
        if (k.includes('basah') || k.includes('daging') || k.includes('ikan')) return imgMap.basah;
        if (k.includes('olahan') || k.includes('jajanan')) return imgMap.olahan;
        if (k.includes('non-halal') || k.includes('non halal')) return imgMap['non-halal'];
        if (k.includes('fnb') || k.includes('f&b') || k.includes('kuliner')) return imgMap.kuliner;
        return imgMap.default;
    }

    /* ── Info card DOM refs ── */
    const infoCard    = document.getElementById('infoCard');
    const infoOverlay = document.getElementById('infoOverlay');
    const infoImage   = document.getElementById('infoImage');
    const infoBadge   = document.getElementById('infoBadge');
    const infoId      = document.getElementById('infoId');
    const infoTitle   = document.getElementById('infoTitle');
    const infoDesc    = document.getElementById('infoDesc');
    const infoLink    = document.getElementById('infoLink');
    const btnClose    = document.getElementById('infoClose');

    function showInfoCard(lapakId, cssClass) {
        const t = tenantData[lapakId];

        infoId.textContent    = lapakId;
        infoTitle.textContent = t?.nama      ?? formatId(lapakId);
        infoDesc.textContent  = t?.deskripsi ?? 'Belum ada informasi detail.';
        infoBadge.textContent = (t?.kategori ?? cssClass.replace(/-/g,' ')).toUpperCase();

        /* Gambar: foto tenant dari DB atau fallback berdasar kategori */
        infoImage.src = t?.foto ?? getImg(t?.kategori ?? cssClass);

        /* Sembunyikan link profil (tidak relevan di guest) */
        infoLink.style.display = 'none';

        infoCard.classList.add('show');
        infoOverlay.classList.remove('hidden'); // hanya mobile
    }

    function closeInfoCard() {
        infoCard.classList.remove('show');
        infoOverlay.classList.add('hidden');
    }

    btnClose?.addEventListener('click', closeInfoCard);

    function formatId(id) {
        return id.replace(/-/g,' ').replace(/\b\w/g, c => c.toUpperCase());
    }

    /* ── Pasang listener ke semua elemen lapak dalam SVG ── */
    const interactiveClasses = [
        'lapak-sayur-buah-dan-jajanan','lapak-olahan-dan-jajanan','lapak-non-halal',
        'lapak-basah','lapak-kuliner','kios-besar','kios-kecil','kios-fnb',
        'atm','mushola','toilet',
    ];

    const svg = document.getElementById('denahSvg');
    const lapakEls = svg ? svg.querySelectorAll(interactiveClasses.map(c => '.' + c).join(',')) : [];

    lapakEls.forEach(el => {
        el.style.cursor = 'pointer';
        el.addEventListener('click', () => {
            const id  = el.id || '';
            const cls = el.classList[0] || '';
            showInfoCard(id, cls);
        });
    });

    /* ── Filter / Legend ── */
    document.querySelectorAll('.legend-item').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.legend-item').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const f = btn.dataset.filter;
            lapakEls.forEach(el => {
                if (f === 'all' || el.classList.contains(f)) {
                    el.classList.remove('lapak-dimmed');
                } else {
                    el.classList.add('lapak-dimmed');
                }
            });
        });
    });

    /* ── Zoom ── */
    let scale = 1;
    const svgEl    = document.getElementById('denahSvg');
    const container = document.getElementById('denahContainer');

    function applyZoom() {
        if (svgEl) svgEl.style.transform = `scale(${scale})`;
    }

    document.getElementById('btn-zoom-in')?.addEventListener('click', () => {
        scale = Math.min(3, parseFloat((scale + 0.3).toFixed(1)));
        applyZoom();
    });
    document.getElementById('btn-zoom-out')?.addEventListener('click', () => {
        scale = Math.max(0.5, parseFloat((scale - 0.3).toFixed(1)));
        applyZoom();
    });
    document.getElementById('btn-zoom-reset')?.addEventListener('click', () => {
        scale = 1;
        applyZoom();
        if (container) { container.scrollTop = 0; container.scrollLeft = 0; }
        closeInfoCard();
    });

    /* ── Pinch-to-zoom (mobile) ── */
    let startDist = null;
    let startScale = 1;

    container?.addEventListener('touchstart', e => {
        if (e.touches.length === 2) {
            startDist  = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
            startScale = scale;
        }
    }, { passive: true });

    container?.addEventListener('touchmove', e => {
        if (e.touches.length === 2 && startDist) {
            const dist  = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
            const ratio = dist / startDist;
            scale = Math.min(3, Math.max(0.5, startScale * ratio));
            applyZoom();
        }
    }, { passive: true });

    container?.addEventListener('touchend', () => { startDist = null; });

    /* Tutup info card saat klik di luar --mobile-- */
    document.addEventListener('click', e => {
        if (!infoCard.contains(e.target) && !e.target.closest('[class]')) {
            closeInfoCard();
        }
    });
})();
</script>
@endsection
