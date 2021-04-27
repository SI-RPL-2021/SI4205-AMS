<?php

namespace App\Http\Controllers;

use App\Models\borrowing;
use App\Models\asset;
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
        $borrow = DB::table('borrowings')->paginate(5);
        $assets = DB::table('assets')->get();

        return view('manajer_inventaris/Borrowing/index', compact(['borrow', 'assets']));
    }
    public function updateindex($id, Request $request)
    {
        $borrow = borrowing::find($id);

        return view('manajer_inventaris/Borrowing/update', compact('borrow'));
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
            'borrowing_end' => 'nullable',
            'borrowing_date' => 'required',
            'borrowing_picture' => 'required',
            'description' => 'nullable',
        ]);
        // file upload
        $file = $request->file('borrowing_picture');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/uploads/borrow', $fileName);
        $file->move('images/uploads/borrow', $fileName);

        borrowing::create([
            'asset_code' => $request->asset_code,
            'borrowing_picture' => $path,
            'borrowing_end' => $request->borrowing_end,
            'borrowing_date' => $request->borrowing_date,
            'description' => $request->description,
            'status' => 'Dipinjamkan',

        ]);




        return redirect('/manajer_inventaris/Borrowing/index');
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
        $borrow->borrowing_end = $request->borrowing_end;
        $borrow->status = $request->status;
        $borrow->description = $request->description;



        $borrow->save();

        return redirect('manajer_inventaris/Borrowing/index');
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
        DB::table('borrowings')->where('id', $id)->delete();

        // alihkan halaman ke halaman asset
        return redirect(route('borrowing.show'));
    }
}
