<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
     
        $borrow = borrowing::orderBy('updated_at', 'DESC')->paginate(5);
        $asset = asset::all();

        return view('manajer_inventaris/Borrowing/rent/index', compact(['borrow', 'asset']));
    }
    public function updateindex($id)
    {
        $borrow = borrowing::find($id);
        $asset = asset::all();
        return view('manajer_inventaris/Borrowing/rent/update', compact('borrow','asset'));
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
            // 'asset_id' => 'required',
            'borrowing_date' => 'required',
            'period' => 'required',
            'description' => 'required',
        ]);

        $borrow = new borrowing;
        $borrow->asset_id = $request['asset_id'];
        $borrow->borrowing_date = $request['borrowing_date'];
        $borrow->description = $request['description'];
        $borrow->period = $request['period'];
        $borrow->status = 0;
        $borrow->save();

        return redirect(route('rent.show'))->with('success', 'Peminjaman Berhasil Ditambahkan');
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
    public function update($id, Request $request)
    {
        $borrow = borrowing::find($id);

        $borrow->asset_code = $request->asset_code;
        $borrow->borrowing_date = $request->borrowing_date;
        $borrow->description = $request->description;



        $borrow->save();

        return redirect(route('rent.show'));
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
        borrowing::find($id)->delete();

        // alihkan halaman ke halaman asset
        return redirect(route('rent.show'))->with('danger', 'Peminjaman Berhasil Dihapus');
    }
}
