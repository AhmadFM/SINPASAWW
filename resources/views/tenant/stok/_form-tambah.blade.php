{{-- resources/views/tenant/stok/_form-tambah.blade.php
     Partial: dipakai di desktop (left column) dan mobile (toggle area)
──────────────────────────────────────────────────────────── --}}

{{-- Nama Barang --}}
<div class="form-group">
    <label class="form-label">NAMA BARANG</label>
    <input type="text" name="nama"
           class="form-input @error('nama') ring-2 ring-red-300 @enderror"
           value="{{ old('nama') }}" placeholder="Nama barang..." required>
    @error('nama')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
</div>

{{-- Harga Jual --}}
<div class="form-group">
    <label class="form-label">HARGA JUAL</label>
    <div class="input-prefix-wrap">
        <span class="input-prefix">Rp</span>
        <input type="number" name="harga_jual"
               class="form-input has-prefix"
               value="{{ old('harga_jual') }}" placeholder="0" min="0" required>
    </div>
</div>

{{-- Stok + Unit (2 kolom) --}}
<div class="grid grid-cols-2 gap-3 form-group">
    <div>
        <label class="form-label">STOK</label>
        <input type="number" name="stok" class="form-input"
               value="{{ old('stok', 0) }}" min="0" required>
    </div>
    <div>
        <label class="form-label">UNIT</label>
        <input type="text" name="unit" class="form-input"
               value="{{ old('unit', 'KG') }}" placeholder="KG">
    </div>
</div>
