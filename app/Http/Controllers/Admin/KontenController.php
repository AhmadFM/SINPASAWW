<?php
// ── app/Http/Controllers/Admin/KontenController.php ───────────────────────
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    /* ── Index: tampilkan semua konten ── */
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'aktif');

        $kontenAktif    = Konten::aktif()->latest()->get();
        $kontenNonaktif = Konten::nonaktif()->latest()->get();

        /* Konten yang sedang di-edit (pre-fill form) */
        $editKonten = null;
        if ($editId = $request->get('edit')) {
            $editKonten = Konten::find($editId);
        }

        return view('admin.konten', compact('kontenAktif', 'kontenNonaktif', 'tab', 'editKonten'));
    }

    /* ── Store: buat konten baru ── */
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'status'   => 'required|in:aktif,nonaktif',
            'deskripsi'=> 'nullable|string|max:255',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $imgUrl = null;
        if ($request->hasFile('gambar')) {
            $path   = $request->file('gambar')->store('konten', 'public');
            $imgUrl = $path;
        }

        Konten::create([
            'user_id'  => Auth::id(),
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'status'   => $request->status,
            'deskripsi'=> $request->deskripsi,
            'img_url'  => $imgUrl,
        ]);

        return redirect()->route('admin.konten', ['tab' => $request->status])
                         ->with('alert', 'Konten berhasil dipublikasikan!');
    }

    /* ── Update: edit konten yang sudah ada ── */
    public function update(Request $request, string $id)
    {
        $konten = Konten::findOrFail($id);

        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'status'   => 'required|in:aktif,nonaktif',
            'deskripsi'=> 'nullable|string|max:255',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = [
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'status'   => $request->status,
            'deskripsi'=> $request->deskripsi,
        ];

        /* Ganti gambar jika ada upload baru */
        if ($request->hasFile('gambar')) {
            if ($konten->img_url) {
                Storage::disk('public')->delete($konten->img_url);
            }
            $data['img_url'] = $request->file('gambar')->store('konten', 'public');
        }

        $konten->update($data);

        return redirect()->route('admin.konten', ['tab' => $request->status])
                         ->with('alert', 'Konten berhasil diperbarui!');
    }

    /* ── Destroy: hapus konten ── */
    public function destroy(string $id)
    {
        $konten = Konten::findOrFail($id);

        if ($konten->img_url) {
            Storage::disk('public')->delete($konten->img_url);
        }

        $konten->delete();

        return back()->with('alert', 'Konten berhasil dihapus!');
    }

    /* ── Toggle status aktif/nonaktif ── */
    public function toggleStatus(string $id)
    {
        $konten    = Konten::findOrFail($id);
        $newStatus = $konten->status === 'aktif' ? 'nonaktif' : 'aktif';
        $konten->update(['status' => $newStatus]);

        return back()->with('alert', "Konten berhasil diubah ke status {$newStatus}.");
    }
}
