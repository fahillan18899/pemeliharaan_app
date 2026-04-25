<?php

namespace App\Http\Controllers;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index()
    {
        $data = Pemeliharaan::latest()->get();
        return view('pemeliharaan.index', compact('data'));
    }

    public function store(Request $request)
    {
        Pemeliharaan::create([
            'alat' => $request->alat,
            'sn' => $request->sn,
            'ruang' => $request->ruang,
            'type' => $request->type,
            'no' => $request->no,
            'waktu' => $request->waktu,
            'ket' => $request->ket,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
