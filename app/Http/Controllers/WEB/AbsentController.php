<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\AbsentController as APIAbsentController;
use Illuminate\Http\Request;

class AbsentController extends Controller
{
    public function index()
    {
        // Membuat instance dari AbsentController
        $APIAbsentController = new APIAbsentController();

        // Mendapatkan data absent untuk sesi event dengan id 1
        $dataUserAbsent = $APIAbsentController->getDataAbsentUserForSesionEvent(1);

        // Menyusun data dalam array (jika perlu)
        $data = [
            'absent' => $dataUserAbsent,
        ];

        // Kirim data ke view
        return view('pages.event.detailEvent.absent.list-user-absent', [
            'dataAbsent' => $data
        ]);
    }
    public function profile()
    {
        $data = [
            'nama' => 'Muktashim Billah',
            'nim' => 'F1E121094',
            'id_nft' => 4266839363

        ];
        return view('pages.user.profile-user', [
            'data' => $data
        ]);
    }
}
