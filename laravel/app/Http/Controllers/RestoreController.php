<?php

namespace App\Http\Controllers;

use App\Models\restore;
use App\Models\borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table asset
        $restore = DB::table('restores')->paginate(5);
        $borrowings = DB::table('borrowings')->get();

        return view('manajer_inventaris/Borrowing/return/index', compact(['restore', 'borrowings']));
    }
    public function updateindex($id, Request $request)
    {
        $restore = restore::find($id);

        return view('manajer_inventaris/Borrowing/return/update', compact('restore'));
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
            'asset_code' => 'required',
            'return_picture' => 'required',
            'return_date' => 'nullable',
            'description' => 'required',

        ]);
        // file upload
        $file = $request->file('return_picture');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/uploads/return', $fileName);
        $file->move('images/uploads/return', $fileName);

        restore::create([
            'asset_code' => $request->asset_code,
            'return_picture' => $path,
            'return_date' => $request->return_date,
            'description' => $request->description,


        ]);
        $code = $request->asset_code;
        DB::table('borrowings')->where('asset_code',$code)->delete(); 


        return redirect('/manajer_inventaris/borrowing/return/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function show(restore $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\restore  $restore
     * @return \Illuminate\Http\Response
     */
    public function edit(restore $restore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\restore  $restore
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $restore = restore::find($id);

        $restore->return_date = $request->return_date;
        $restore->description = $request->description;



        $restore->save();

        return redirect('manajer_inventaris/borrowing/return/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data asset berdasarkan id yang dipilih
        DB::table('restores')->where('id', $id)->delete();

        // alihkan halaman ke halaman asset
        return redirect(route('return.show'));
    }
}
