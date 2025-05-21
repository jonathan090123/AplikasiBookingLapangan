@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 p-5 border rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Form Pemesanan Jadwal</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-3">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('pesanan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nama</label>
            <input type="text" name="nama_pemesan" class="w-full border rounded p-2" value="{{ old('nama_pemesan') }}" required>
            @error('nama_pemesan') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block">Whatsapp</label>
            <input type="text" name="wa_pemesan" class="w-full border rounded p-2" value="{{ old('wa_pemesan') }}" required>
            @error('wa_pemesan') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block">Tanggal Booking</label>
            <input type="date" name="tanggal" class="w-full border rounded p-2" value="{{ old('tanggal') }}" required>
            @error('tanggal') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block">Jam Pemakaian</label>
            <select name="jadwal_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Jadwal --</option>
                @foreach ($jadwal as $j)
                    <option value="{{ $j->id }}">
                        Lapangan {{ $j->nomor_lapangan }} ({{ $j->jam_mulai }} - {{ $j->jam_selesai }})
                    </option>
                @endforeach
            </select>
            @error('jadwal_id') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
