<?php

namespace App\Http\Controllers\Api;

use App\Models\Kontrak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontrakController extends Controller
{
    public function index()
    {
        //get data categories
        $kontrak = Kontrak::latest()->paginate(12);

        //return with response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Kontrak',
            'data'    => $kontrak,
        ], 200);
    }
}
