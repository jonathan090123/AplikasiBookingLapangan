@extends('layouts.app')

@section('title', 'Edit Pemesanan')

@section('content')
    @if(session('error'))
        <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nama Pemesan</label>
            <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan', $pesanan->nama_pemesan) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">WA Pemesan</label>
            <input type="text" name="wa_pemesan" value="{{ old('wa_pemesan', $pesanan->wa_pemesan) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $pesanan->tanggal) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Pilih Jadwal</label>
            <select name="jadwal_id" class="w-full p-2 border rounded" required>
                <option value="">-- Pilih Jadwal --</option>
                @foreach($jadwal as $j)
                    <option value="{{ $j->id }}" {{ $pesanan->jadwal_id == $j->id ? 'selected' : '' }}>
                        Lapangan {{ $j->nomor_lapangan }} - {{ $j->jam_mulai }} s/d {{ $j->jam_selesai }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update</button>
        <a href="{{ route('pesanan.index') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
    </form>
@endsection
