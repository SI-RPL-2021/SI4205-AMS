<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table maintenance
        $maintenance = DB::table('maintenances')->get();
        $maintenances = maintenance::all();

        return view('manajer_inventaris/maintenance/input', compact('maintenances'));
        // // mengambil data dari table asset
        // $aset = DB::table('assets')->get();

        // mengirim data asset ke view input
       
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([

            'name' => 'required',
            'asset_demage' => 'required',
            'asset_age' => 'required',
            'maintenance_bill' => 'required',
            'demage_status' => 'required',
            'description' => 'required',

        ]);
    
        $insert = maintenance::create([
            'name' => $request->name,
            'asset_demage' => $request->asset_demage,
            'asset_age' => $request->asset_age,
            'maintenance_bill' => $request->maintenance_bill,
            'demage_status' => $request->demage_status,
            'description' => $request->description,
            

        ]);
        return redirect('/maintenance/input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data asset berdasarkan id yang dipilih
        DB::table('maintenances')->where('id', $id)->delete();

        // alihkan halaman ke halaman asset
        return redirect('/maintenance/input');
    }
}
