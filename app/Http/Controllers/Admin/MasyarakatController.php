<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;


class MasyarakatController extends Controller
{
    public function index()
    {
        // Mengambil data semua masyarakat
        $masyarakat = Masyarakat::all();
        return view('Admin.Masyarakat.index', ['masyarakat' => $masyarakat]);
    }

    public function show($nik)
    {
        $masyarakat = Masyarakat::where('nik', $nik)->first();

        return view('Admin.Masyarakat.show', ['masyarakat' => $masyarakat]);
    }

    public function destroy($nik)
    {
        $masyarakat = Masyarakat::where('nik', $nik)->first();

        if ($masyarakat) {
            $pengaduan = Pengaduan::where('nik', $nik)->get();

            foreach ($pengaduan as $p) {
                $p->tanggapan()->delete();
                $p->delete();
            }

            $masyarakat->delete();

            return redirect()->route('masyarakat.index')->with('success', 'Masyarakat and related Pengaduan deleted successfully');
        } else {
            return redirect()->route('masyarakat.index')->with('error', 'Masyarakat not found');
        }
}

}
