<?php
namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\LogAksi;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::orderBy('deadline')->get();
        return view('tugas.index', compact('tugas'));
    }

    public function create()
    {
        return view('tugas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'tugas' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $tugas = Tugas::create($data);

        LogAksi::create(['tugas_id' => $tugas->id, 'aksi' => 'dibuat']);

        return redirect()->route('tugas.index')->with('success', 'Tugas ditambahkan.');
    }

    public function edit(Tugas $tugum)
    {
        // Note: route-model binding name depends on route param; using 'tugas' below.
        // If using parameter named 'tugas', declare function param as (Tugas $tugas)
        $tugas = $tugum;
        return view('tugas.edit', compact('tugas'));
    }

    public function update(Request $request, Tugas $tugas)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'tugas' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'nullable|in:selesai,belum selesai',
        ]);

        $tugas->update($data);

        LogAksi::create(['tugas_id' => $tugas->id, 'aksi' => 'diupdate']);

        return redirect()->route('tugas.index')->with('success', 'Tugas diperbarui.');
    }

    public function destroy(Tugas $tugas)
    {
        LogAksi::create(['tugas_id' => $tugas->id, 'aksi' => 'dihapus']);
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas dihapus.');
    }

    // tambahan: menandai selesai / toggle
    public function selesai(Tugas $tugas)
    {
        $tugas->status = 'selesai';
        $tugas->save();

        LogAksi::create(['tugas_id' => $tugas->id, 'aksi' => 'selesai']);

        return redirect()->route('tugas.index')->with('success', 'Tugas ditandai selesai.');
    }
}
