<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\restore;
use App\Models\borrowing;
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
        if (Auth::user()->role != 'karyawan') {
            $restore->status = 1;
        } else {
            $restore->status = 0;
        }
        
       

        $borrow = borrowing::find($request['borrowing_id']);
        $borrow->status = 1;
        $borrow->save();
        $restore->save();
        // dd($request);
        $borrow = borrowing::find($request['borrowing_id']);
        $cek = History::Where('asset_id', $borrow->asset_id)->Where('borrowing_date', $borrow->borrowing_date)->first();
        if (empty($cek->return_date)) {
            $cek->return_date = $request['return_date'];
            $cek->save();
        } else {
            $history = new History();
            $history->asset_id = $request['asset_id'];
            $history->return_date = $request['return_date'];
            // $asset->borrowing_date = $request['borrowing_date'];
            // $asset->return_date = $request['return_date'];
            // $asset->jenis_laporan = $request['jenis_laporan'];
            // $asset->biaya = $request['biaya'];
            // $asset->author = $request['author'];
            $history->save();
        }
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
    public function update(Request $request, $id)
    {
        $restore = restore::find($id);

        if ($request->hasFile('return_picture')) {
            // file upload
            $file = $request->file('return_picture');
            $fileName = rand() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images/uploads/return', $fileName);
            $file->move('images/uploads/return', $fileName);
        } else {

            $path = $restore->return_picture;
        }
        $restore->borrowing_id =  $request['borrowing_id'];
        $restore->return_date =  $request['return_date'];
        $restore->return_picture = $path;
        $restore->status = $request['status'];


        $restore->save();

        return redirect(route('return.show'));
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