<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Izin;

class IzinController extends Controller
{
    // Tampilkan form pengajuan izin
    public function create()
    {
        return view('karyawan.izin.create');
    }

    // Simpan pengajuan izin ke database
    public function store(Request $request)
    {
        $request->validate([
            'alasan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'file_bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf,mp4|max:20480',
        ]);

        $path = $request->file('file_bukti')?->store('izin_files');

        Izin::create([
            'user_id' => auth()->id(),
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => 'pending',
            'file_bukti' => $path,
        ]);

        return redirect()->route('izin.index')->with('success', 'Pengajuan izin berhasil dikirim.');
    }

    // Tampilkan riwayat izin user
    public function index()
    {
        // Ambil semua izin milik user termasuk komentar admin
        $izins = Izin::where('user_id', auth()->id())
            ->select('id', 'alasan', 'tanggal_mulai', 'tanggal_selesai', 'status', 'file_bukti', 'komentar_admin')
            ->latest()
            ->get();

        return view('karyawan.izin.index', compact('izins'));
    }
}
