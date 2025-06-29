<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-gray-900 p-10 rounded-2xl shadow-lg text-white animate-fade-in">
            <div class="flex flex-col items-center text-center space-y-6">

                {{-- Icon atau gambar ilustrasi --}}
                <svg class="w-20 h-20 text-amber-400 drop-shadow-lg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4 -4M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10z" />
</svg>


                {{-- Sapaan --}}
                <h1 class="text-3xl font-bold">
                    Hai, {{ Auth::user()->name }} 👋
                </h1>

                {{-- Status login --}}
                @if (session('status'))
                    <div class="bg-green-600/20 text-green-300 border border-green-500 px-4 py-2 rounded-md shadow">
                        {{ session('status') }}
                    </div>
                @else
                    <div class="bg-blue-600/20 text-blue-300 border border-blue-500 px-4 py-2 rounded-md shadow">
                        Kamu berhasil login ke sistem.
                    </div>
                @endif

                <p class="text-gray-300">
                    Selamat datang di <span class="text-amber-400 font-semibold">Sistem Perizinan Karyawan</span>.  
                    Kamu bisa mengajukan izin atau melihat riwayat izinmu melalui menu di atas.
                </p>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
</x-app-layout>
