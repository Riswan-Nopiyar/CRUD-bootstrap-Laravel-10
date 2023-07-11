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
            ->with('success', 'Data Kursus berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kursus = Kursus::find($id);

        if (!$kursus) {
            return redirect()->route('kursus.index')->with('error', 'Kursus tidak ditemukan.');
        }
        return view('kursus.show', compact('kursus'));
    }

    public function edit($id)
    {
        $kursus = Kursus::find($id);

        if (!$kursus) {
            return redirect()->route('kursus.index')->with('error', 'Kursus tidak ditemukan.');
        }
        return view('kursus.edit', compact('kursus'));
    }


    public function update(Request $request, $id)
    {
        $kursus = Kursus::findOrFail($id);

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
            ->with('success', 'Data Kursus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        return redirect()->route('kursus.index')
            ->with('success', 'Data Kursus berhasil dihapus.');
    }
}
