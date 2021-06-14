<?php

namespace App\Http\Controllers;

use App\Models\borrowing;
use App\Models\restore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restore = restore::orderBy('updated_at', 'DESC')->where('author', Auth::user()->role)->paginate(5);
        $borrow = borrowing::all()->where('author', Auth::user()->role);

        return view('manajer_inventaris/Borrowing/return/index', compact(['borrow', 'restore']));
    }

    public function updateindex($id)
    {
        $restore = restore::find($id);
        $borrow = borrowing::all();
        return view('manajer_inventaris/Borrowing/return/update', compact('borrow', 'restore'));
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
            // 'borrowing_id' => 'required',
            'return_date' => 'required',
            'return_picture' => 'required',
            'description' => 'required',
        ]);
        // file upload
        $file = $request->file('return_picture');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/uploads/return', $fileName);
        $file->move('images/uploads/return', $fileName);

        $restore = new restore;
        $restore->borrowing_id = $request['borrowing_id'];
        $restore->return_date = $request['return_date'];
        $restore->return_picture = $path;
        $restore->description = $request['description'];
        $restore->author = Auth::user()->role;
        $restore->status = 0;

        $borrow = borrowing::find($request['borrowing_id']);
        $borrow->status = 1;
        $borrow->save();
        $restore->save();
        // dd($request);
        return redirect(route('return.show'))->with('success', 'Pengembalian Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\restore  $restore
     * @return \Illuminate\Http\Response
     */
    public function show(restore $restore)
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
    public function update(Request $request, restore $restore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restore  $restore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data asset berdasarkan id yang dipilih
        restore::find($id)->delete();

        // alihkan halaman ke halaman asset
        return redirect(route('return.show'))->with('danger', 'Pengembalian Berhasil Dihapus');
    }
}
