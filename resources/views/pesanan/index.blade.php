    @extends('layouts.app')

    @section('title', 'Daftar Pemesanan Lapangan')

    @section('content')

        <form method="GET" action="{{ route('pesanan.index') }}" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <input type="text" name="nama_pemesan" value="{{ request('nama_pemesan') }}" placeholder="Cari nama pemesan..."
                class="border rounded p-2">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="border rounded p-2">
            <button class="bg-blue-500 text-white rounded px-4 py-2">Cari</button>
        </form>

        <table class="w-full table-auto bg-white border shadow rounded overflow-hidden">
            <thead class="bg-blue-100 text-left">
                <tr>
                    <th class="p-3 border">#</th>
                    <th class="p-3 border">Nama Pemesan</th>
                    <th class="p-3 border">WA</th>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Lapangan</th>
                    <th class="p-3 border">Jam</th>
                    <th class="p-3 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanan as $index => $p)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border">{{ $index + 1 }}</td>
                        <td class="p-3 border">{{ $p->nama_pemesan }}</td>
                        <td class="p-3 border">{{ $p->wa_pemesan }}</td>
                        <td class="p-3 border">{{ $p->tanggal }}</td>
                        <td class="p-3 border">Lapangan {{ $p->jadwal->nomor_lapangan }}</td>
                        <td class="p-3 border">{{ $p->jadwal->jam_mulai }} - {{ $p->jadwal->jam_selesai }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">Tidak ada data pemesanan.</td>
                    </tr>
                @endforelse@extends('layouts.app')

                @section('title', 'Daftar Pemesanan Lapangan')

            @section('content')

                <form method="GET" action="{{ route('pesanan.index') }}"
                    class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" name="nama_pemesan" value="{{ request('nama_pemesan') }}"
                        placeholder="Cari nama pemesan..." class="border rounded p-2">
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="border rounded p-2">
                    <button class="bg-blue-500 text-white rounded px-4 py-2">Cari</button>
                </form>

                <table class="w-full table-auto bg-white border shadow rounded overflow-hidden">
                    <thead class="bg-blue-100 text-left">
                        <tr>
                            <th class="p-3 border">No</th>
                            <th class="p-3 border">Nama</th>
                            <th class="p-3 border">Whatsapp</th>
                            <th class="p-3 border">Tanggal Booking</th>
                            <th class="p-3 border">Lapangan</th>
                            <th class="p-3 border">Jam</th>
                            <th class="p-3 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanan as $index => $p)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border">{{ $index + 1 }}</td>
                                <td class="p-3 border">{{ $p->nama_pemesan }}</td>
                                <td class="p-3 border">{{ $p->wa_pemesan }}</td>
                                <td class="p-3 border">{{ $p->tanggal }}</td>
                                <td class="p-3 border">Lapangan {{ $p->jadwal->nomor_lapangan }}</td>
                                <td class="p-3 border">{{ $p->jadwal->jam_mulai }} - {{ $p->jadwal->jam_selesai }}</td>
                                <td class="p-3 border">
                                    <a href="{{ route('pesanan.edit', $p->id) }}"
                                        class="text-blue-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('pesanan.destroy', $p->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-4 text-gray-500">Tidak ada data pemesanan.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            @endsection


        </tbody>
    </table>

@endsection
