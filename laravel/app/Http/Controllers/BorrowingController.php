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
        $borrow = DB::table('borrowings')->paginate(5);
        $assets = DB::table('assets')->get();

        return view('manajer_inventaris/Borrowing/index', compact(['borrow','assets']));
      
    }
    public function updateindex($id, Request $request)
    {
        $assets = borrowing::find($id);

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
            'unique_code' => 'required',
            'borrowing_end' => 'required',
            'borrowing_date' => 'required',
            'borrowing_picture' => 'required',
            'description' => 'required',
        ]);
      
        // file upload
        $file = $request->file('borrowing_picture');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/uploads', $fileName);
        $file->move('images/uploads', $fileName);

        $insert = borrowing::create([
            'borrowing_end' => $request->name,
            'borrowing_picture' => $path,
            'borrowing_date' => $request->asset_category,
            'description' => $request->description,
            'status' => 'Dipinjamkan',

        ]);
        return redirect('/manajer_inventaris/Input_Asset/index');
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
        //
    }
}
