<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        //get data categories
        $pegawai = Pegawai::latest()->paginate(12);

        //return with response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Pegawai',
            'data'    => $pegawai,
        ], 200);
    }

    public function show($status_kontrak)
    {
        //get detail data campaign
        $detail = Pegawai::where('status_kontrak', $status_kontrak)->first();

        if($detail) {

            //return with response JSON
            return response()->json([
                'success'   => true,
                'message'   => 'Detail Data Pegawai : '. $detail->status_kontrak,
                'data'      => $detail
            ], 200);
        }

        //return with response JSON
        return response()->json([
            'success' => false,
            'message' => 'Data Pegawai yang berstatus '. $status_kontrak .' Tidak Ditemukan!',
        ], 404);
    }
}
