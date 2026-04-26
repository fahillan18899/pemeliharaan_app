<?php

namespace App\Http\Controllers;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemeliharaan::query();

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('alat', 'like', "%$search%")
                ->orWhere('sn', 'like', "%$search%")
                ->orWhere('ruang', 'like', "%$search%")
                ->orWhere('type', 'like', "%$search%")
                ->orWhere('teknisi', 'like', "%$search%")
                ->orWhere('no', 'like', "%$search%")
                ->orWhere('ket', 'like', "%$search%");
            });
        }

        $data = $query->latest()->get();

        return view('pemeliharaan.index', compact('data'));
    }

    public function store(Request $request)
    {
        Pemeliharaan::create([
            'alat' => $request->alat,
            'sn' => $request->sn,
            'ruang' => $request->ruang,
            'type' => $request->type,
            'teknisi' => $request->teknisi,
            'no' => $request->no,
            'waktu' => $request->waktu,
            'ket' => $request->ket,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $data = Pemeliharaan::findOrFail($id);
        return view('pemeliharaan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $item = Pemeliharaan::findOrFail($id);

        $item->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Data berhasil diupdate');
    }

    public function print($id)
    {
        $data = Pemeliharaan::findOrFail($id);
        return view('pemeliharaan.print', compact('data'));
    }

    public function view($id)
    {
        $data = Pemeliharaan::findOrFail($id);
        return view('pemeliharaan.show', compact('data'));
    }
}
