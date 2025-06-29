<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-950 px-4">
        <div class="w-full max-w-md bg-gray-900 text-white p-8 rounded-xl shadow-lg space-y-6">
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-tight">Sistem Perizinan</h1>
                <p class="text-sm text-gray-400">Silakan login untuk melanjutkan</p>
            </div>

            @if (session('status'))
                <div class="bg-green-500/10 text-green-400 text-sm p-2 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input id="email" name="email" type="email" required autofocus
                        class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-md px-3 py-2 focus:ring-2 focus:ring-amber-500 focus:outline-none" />
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-md px-3 py-2 focus:ring-2 focus:ring-amber-500 focus:outline-none" />
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-600 bg-gray-800 text-amber-500 focus:ring-amber-500">
                        <span>Ingat saya</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-amber-500 hover:underline">Lupa password?</a>
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 bg-amber-500 text-black font-semibold rounded-md hover:bg-amber-600 transition">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
