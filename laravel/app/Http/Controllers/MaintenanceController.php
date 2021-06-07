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

<<<<<<< HEAD
        return view('manajer_inventaris/maintenance/input', compact('maintenances'));
=======
        return view('manajer_inventaris/maintenance/index', compact('maintenances'));
>>>>>>> 2ee0f753fa78968eaf626583900ef72ca5ccc26f
        // // mengambil data dari table asset
        // $aset = DB::table('assets')->get();

        // mengirim data asset ke view input
       
    }
<<<<<<< HEAD
    public function updateinput($id, Request $request)
=======
    public function updateindex($id, Request $request)
>>>>>>> 2ee0f753fa78968eaf626583900ef72ca5ccc26f
    {
        $maintenances = Maintenance::find($id);

        return view('manajer_inventaris/Maintenance/update', compact('maintenances'));
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
            'asset_damage' => 'required',
            'asset_age' => 'required',
            'maintenance_bill' => 'required',
            'damage_status' => 'required',
            

        ]);
      
        $insert = maintenance::create([
            'name' => $request->name,
            'asset_damage' => $request->asset_damage,
            'asset_age' => $request->asset_age,
            'maintenance_bill' => $request->maintenance_bill,
            'damage_status' => $request->damage_status,
           
            

        ]);
<<<<<<< HEAD
        return redirect('/maintenance/input');
=======
        return redirect(route('maintenance.show'));
>>>>>>> 2ee0f753fa78968eaf626583900ef72ca5ccc26f
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

        $maintenance->name = $request->name;
        $maintenance->asset_damage = $request->asset_damage;
        $maintenance->asset_age = $request->asset_age;
        $maintenance->maintenance_bill = $request->maintenance_bill;
        $maintenance->damage_status = $request->damage_status;
        
    
        $maintenance-> save();
        return redirect('/maintenance/input');
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
<<<<<<< HEAD
        return redirect('/maintenance/input');
=======
        return redirect(route('maintenance.show'));
>>>>>>> 2ee0f753fa78968eaf626583900ef72ca5ccc26f
    }
}
