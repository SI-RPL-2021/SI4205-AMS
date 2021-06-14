<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\History;
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

        $maintenances = maintenance::all();
        $asset = asset::all();
        return view('manajer_inventaris/maintenance/index', compact('maintenances', 'asset'));
        // // mengambil data dari table asset
        // $aset = DB::table('assets')->get();

        // mengirim data asset ke view input

    }
    public function updateindex($id, Request $request)
    {
        $maintenances = Maintenance::find($id);
        $asset = asset::all();
        return view('manajer_inventaris/Maintenance/update', compact('maintenances', 'asset'));
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

        $request->validate([

            'asset_id' => 'required',
            'asset_damage' => 'required',
            'asset_age' => 'required',
            'maintenance_bill' => 'required',
            'damage_status' => 'required',


        ]);
        $main = new maintenance();
        $main->asset_id = $request['asset_id'];
        $main->asset_damage = $request['asset_damage'];
        $main->asset_age = $request['asset_age'];
        $main->maintenance_bill = $request['maintenance_bill'];
        $main->damage_status = $request['damage_status'];

        $main->save();

        $cek = History::Where('asset_id', $request['asset_id'])->first();
        if (empty($cek->jenis_laporan) || empty($cek->biaya)) {
            $cek->jenis_laporan = $request['asset_damage'];
            $cek->biaya = $request['maintenance_bill'];
            $cek->save();
        } else {
            $history = new History();
            $history->asset_id = $request['asset_id'];
            $history->jenis_laporan = $request['asset_damage'];
            $history->biaya = $request['maintenance_bill'];
            // $asset->borrowing_date = $request['borrowing_date'];
            // $asset->return_date = $request['return_date'];
            // $asset->jenis_laporan = $request['jenis_laporan'];
            // $asset->biaya = $request['biaya'];
            // $asset->author = $request['author'];
            $history->save();
        }


        return redirect(route('maintenance.show'));
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
    public function update($id, Request $request)
    {
        $maintenance = Maintenance::find($id);

    
        $maintenance->asset_damage = $request->asset_damage;
        $maintenance->asset_age = $request->asset_age;
        $maintenance->maintenance_bill = $request->maintenance_bill;
        $maintenance->damage_status = $request->damage_status;

        $cek = History::Where('asset_id', $request['asset_id'])->Where('biaya', $maintenance->maintenance_bill)->Where('jenis_laporan', $maintenance->asset_damage)->first();
      
        $cek->jenis_laporan = $request['asset_damage'];
        $cek->biaya = $request['maintenance_bill'];
        $cek->save();
        $maintenance->save();

        




        return redirect(route('maintenance.show'));
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
        return redirect(route('maintenance.show'));
    }
}
