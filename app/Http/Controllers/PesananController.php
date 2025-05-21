<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function create()
    {
        $jadwal = Jadwal::all();
        return view('pesanan.create', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'wa_pemesan' => 'required|string|size:12', 
            'tanggal' => 'required|date|after_or_equal:today',
            'jadwal_id' => 'required|exists:jadwal,id',
        ]);

        $bentrok = Pesanan::where('tanggal', $request->tanggal)
            ->where('jadwal_id', $request->jadwal_id)
            ->exists();

        if ($bentrok) {
            return redirect()->back()->withInput()->with('error', 'Jadwal sudah dipesan untuk tanggal tersebut.');
        }

        $pesanan = new Pesanan();
        $pesanan->nama_pemesan = $request->nama_pemesan;
        $pesanan->wa_pemesan = $request->wa_pemesan;
        $pesanan->tanggal = $request->tanggal;
        $pesanan->jadwal_id = $request->jadwal_id;
        $pesanan->save();

        return redirect()->route('pesanan.create')->with('success', 'Pemesanan berhasil dibuat!');
    }

    public function index(Request $request)
    {
        $query = Pesanan::with('jadwal')->orderBy('tanggal', 'asc');

        if ($request->filled('nama_pemesan')) {
            $query->where('nama_pemesan', 'like', '%' . $request->nama_pemesan . '%');
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $pesanan = $query->get();

        return view('pesanan.index', compact('pesanan'));
    }

    public function edit($id)
{
    $pesanan = Pesanan::findOrFail($id);
    $jadwal = Jadwal::all();
    return view('pesanan.edit', compact('pesanan', 'jadwal'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_pemesan' => 'required|string|max:100',
        'wa_pemesan' => 'required|string|size:12',
        'tanggal' => 'required|date|after_or_equal:today',
        'jadwal_id' => 'required|exists:jadwal,id',
    ]);

    $bentrok = Pesanan::where('tanggal', $request->tanggal)
        ->where('jadwal_id', $request->jadwal_id)
        ->where('id', '!=', $id)
        ->exists();

    if ($bentrok) {
        return redirect()->back()->withInput()->with('error', 'Jadwal sudah dipesan di tanggal tersebut.');
    }

    $pesanan = Pesanan::findOrFail($id);
    $pesanan->update($validated);

    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui!');
}

}
