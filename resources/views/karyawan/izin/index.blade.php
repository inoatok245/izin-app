<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white leading-tight">
            Riwayat Izin Saya
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto bg-gray-900 p-6 rounded-xl shadow-lg text-white">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-600/20 text-green-400 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-gray-700">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="p-3 text-left">#</th>
                            <th class="p-3 text-left">Alasan</th>
                            <th class="p-3 text-left">Tanggal</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Bukti</th>
                            <th class="p-3 text-left">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($izins as $izin)
                            <tr class="border-t border-gray-700 hover:bg-gray-800">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $izin->alasan }}</td>
                                <td class="p-3">{{ $izin->tanggal_mulai }} - {{ $izin->tanggal_selesai }}</td>
                                <td class="p-3 capitalize">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                        {{ $izin->status === 'disetujui' ? 'bg-green-600 text-white' : ($izin->status === 'ditolak' ? 'bg-red-600 text-white' : 'bg-yellow-600 text-white') }}">
                                        {{ $izin->status }}
                                    </span>
                                </td>
                                <td class="p-3">
                                    @if ($izin->file_bukti)
                                        <a href="{{ Storage::url($izin->file_bukti) }}" target="_blank"
                                            class="text-amber-400 underline">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="p-3">
                                    {{ $izin->komentar_admin ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-400">Belum ada pengajuan izin.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
