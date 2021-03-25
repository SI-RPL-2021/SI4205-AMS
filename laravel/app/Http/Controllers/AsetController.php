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

	// method untuk hapus data pegawai
public function hapus($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('assets')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/manajer_inventaris/input');
}

}
