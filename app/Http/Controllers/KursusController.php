<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;

class KursusController extends Controller
{
    public function index()
    {
        $kursus = Kursus::all();
        return view('kursus.index', compact('kursus'));
    }

    public function create()
    {
        return view('kursus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi_mulai' => 'required|date',
            'durasi_selesai' => 'required|date',
            'link_embed' => 'required',
            'foto_kursus' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto_kursus')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $input['foto_kursus'] = $imageName;
        }

        Kursus::create($input);

        return redirect()->route('kursus.create')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function show(Kursus $kursus)
    {
        return view('kursus.show', compact('kursus'));
    }

    public function edit(Kursus $kursus)
    {
        return view('kursus.edit', compact('kursus'));
    }

    public function update(Request $request, Kursus $kursus)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi_mulai' => 'required|date',
            'durasi_selesai' => 'required|date',
            'link_embed' => 'required',
            'foto_kursus' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto_kursus')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $input['foto_kursus'] = $imageName;
        } else {
            unset($input['foto_kursus']);
        }

        $kursus->update($input);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy(Kursus $kursus)
    {
        $kursus->delete();

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}
