<?php

namespace App\Http\Controllers;

use App\Models\asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table asset
        $aset = DB::table('assets')->get();
        $assets = asset::all();

        return view('manajer_inventaris.Input_Asset.index', compact('assets'));
        // // mengambil data dari table asset
        // $aset = DB::table('assets')->get();

        // mengirim data asset ke view index
        return view('/manajer_inventaris/input', ['assets' => $aset]);
    }
    public function updateindex()
    {
        // mengambil data dari table asset
        $aset = DB::table('assets')->get();
        $assets = asset::all();

        return view('manajer_inventaris.Input_Asset.index', compact('assets'));
        // // mengambil data dari table asset
        // $aset = DB::table('assets')->get();

        // mengirim data asset ke view index
        return view('/manajer_inventaris/input', ['assets' => $aset]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'asset_category' => 'required',
            'asset_purchase_price' => 'required',
            'asset_purchase_date' => 'required',
            'picture' => 'required',
            'description' => 'required',
        ]);

        // file upload
        $file = $request->file('picture');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/uploads', $fileName);
        $file->move('images/uploads', $fileName);

        $insert = asset::create([
            'name' => $request->name,
            'unique_code' => $request->name,
            'picture' => $path,
            'asset_category' => $request->asset_category,
            'asset_purchase_date' => $request->asset_purchase_date,
            'asset_purchase_price' => $request->asset_purchase_price,
            'description' => $request->description,
            'status' => 'Tersedia',

        ]);
        return redirect('/manajer_inventaris/Input_Asset/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data asset berdasarkan id yang dipilih
        DB::table('assets')->where('id', $id)->delete();

        // alihkan halaman ke halaman asset
        return redirect('/manajer_inventaris/input');
    }
}
