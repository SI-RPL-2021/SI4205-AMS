<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$aset = DB::table('assets')->get();

    	// mengirim data pegawai ke view index
    	return view('/manajer_inventaris/input',['assets' => $aset]);

    }
}
