<?php

namespace App\Http\Controllers;

use App\Models\borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table asset
      $borrowing = DB::table('borrowings')->get();
      $borrowings = borrowing::all();

      return view('manajer_inventaris/simpan_pinjam/index',compact('borrowings'));
      // // mengambil data dari table asset
      // $aset = DB::table('assets')->get();

      // mengirim data asset ke view index
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
            'borrowing_picture' => 'required',
            'borrowing_date' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        // file upload
        $file = $request->file('borrowing_picture');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/uploads', $fileName);
        $file->move('images/uploads', $fileName);
                
        $insert = borrowing::create([
            'borrowing_picture' => $path,
            'borrowing_date' => $request->borrowing_date,
            'description' => $request->description,
            'status' => $request->status,

        ]);
        return redirect('/manajer_inventaris/simpan_pinjam/index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function show(borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function edit(borrowing $borrowing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, borrowing $borrowing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function destroy(borrowing $borrowing)
    {
        DB::table('borrowings')->where('id', $id)->delete();

        // alihkan halaman ke halaman asset
        return redirect('/manajer_inventaris/simpan_pinjam_form');
    }
}
