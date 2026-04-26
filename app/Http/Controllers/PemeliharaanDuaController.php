<?php

namespace App\Http\Controllers;
use App\Models\PemeliharaanDua;

use Illuminate\Http\Request;

class PemeliharaanDuaController extends Controller
{
        public function store(Request $request)
    {
        PemeliharaanDua::create([
            'alat_id' => $request->alat_id,
            'waktu' => $request->waktu,
            'ket' => $request->ket,
            'teknisi' => $request->teknisi,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
