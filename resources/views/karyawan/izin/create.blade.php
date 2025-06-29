<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white leading-tight">
            Pengajuan Izin
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-xl shadow-lg text-white">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-600/20 text-green-400 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('izin.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-1 font-medium">Alasan Izin</label>
                    <input type="text" name="alasan" required
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 focus:ring-2 focus:ring-amber-500" />
                </div>

                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="block mb-1 font-medium">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" required
                            class="w-full bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 focus:ring-2 focus:ring-amber-500" />
                    </div>
                    <div class="flex-1">
                        <label class="block mb-1 font-medium">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" required
                            class="w-full bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 focus:ring-2 focus:ring-amber-500" />
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Bukti (opsional)</label>
                    <input type="file" name="file_bukti"
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-amber-600 file:text-white hover:file:bg-amber-700" />
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-black font-semibold px-6 py-2 rounded-md">
                        Ajukan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
