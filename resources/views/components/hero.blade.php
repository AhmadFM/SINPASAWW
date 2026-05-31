<h1>{{ $konten->judul }}</h1>

<p>
    {{ Str::limit(strip_tags($konten->isi), 150) }}
</p>

<a href="{{ route('konten.show', $konten->konten_id) }}">
    Selengkapnya
</a>
