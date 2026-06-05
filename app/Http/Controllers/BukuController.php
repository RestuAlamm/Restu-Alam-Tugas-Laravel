<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BukuController extends Controller
{
    public function index(): View
    {
        $buku = Buku::latest()->paginate(5);

        return view('buku.index', compact('buku'));
    }

     public function create(): View
    {
        return view('buku.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|min:3',
            'deskripsi' => 'required|min:5',
        ]);

        Buku::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('buku.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $buku = Buku::findOrFail($id);

        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|min:3',
            'deskripsi' => 'required|min:5',
        ]);

        $buku = Buku::findOrFail($id);

        $buku->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('buku.index')
            ->with('success', 'Data buku berhasil diubah.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()
            ->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}
