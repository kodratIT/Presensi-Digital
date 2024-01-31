<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\absents;
use App\Models\sesi_absent_event;
use Illuminate\Http\Request;
use App\Models\User;



class AbsentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'tipe' => 'required|string',
            'kode' => 'required|string',
            'sesion' => 'required|integer',
        ]);

        // Cek apakah sesi dengan id yang diberikan ada
        $sesiAbsentEvent = sesi_absent_event::find($request->sesion);
        if (!$sesiAbsentEvent) {
            return response()->json([
                'success' => false,
                'message' => 'Sesi Absent Event tidak ditemukan'
            ], 200);
        }

        // Cek jenis tipe dan kode
        $user = null;
        if ($request->tipe == 'nft') {
            // Cek apakah user dengan id_nft yang diberikan ada
            $user = User::where('id_nft', $request->kode)->first();
        } elseif ($request->tipe == 'qr') {
            // Cek apakah user dengan nim dan full_name yang diberikan ada
            $kodeParts = explode('_', $request->kode);
            $nim = $kodeParts[0];
            $id_nft = $kodeParts[1];

            $user = User::where('nim', $nim)->where('id_nft', $id_nft)->first();
        }

        // Jika user tidak ditemukan
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ], 200);
        }

        // Jika lolos semua pengecekan, simpan data ke tabel Absent
        $absent = Absents::firstOrCreate(
            [
                'id_absent_event' => $sesiAbsentEvent->id,
                'id_user' => $user->id,
                'absent' => 'h', // Sesuaikan dengan nilai yang benar
                'tipe' => $request->tipe,
            ]
        );

        if ($absent->wasRecentlyCreated) {
            // Ambil data user (nama dan nim)
            $userData = [
                'nim' => $user->nim,
                'full_name' => $user->full_name,
            ];

            // Ambil data absent dengan sesi absen = sesion
            $absentData = $this->getDataAbsentUserForSesionEvent($sesiAbsentEvent->id);

            // Berikan data melalui respons
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diterima ' . $request->tipe,
                'absentData' => $absentData,
                'userData' => $userData
            ], 200);
        } else {
            // Data sudah ada (duplikat)
            return response()->json([
                'success' => false,
                'message' => $user->full_name . ' sudah melakukan absent'
            ], 200);
        }
    }

    public function getDataAbsentUserForSesionEvent($id)
    {
        $absentData = absents::where('id_absent_event', $id)
            ->join('users', 'absents.id_user', '=', 'users.id')
            ->select('users.nim', 'users.full_name', 'absents.tipe', 'absents.absent')
            ->get();

        return $absentData;
    }
}
