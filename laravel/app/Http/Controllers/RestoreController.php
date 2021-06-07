<?php

namespace App\Http\Controllers;

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
        
        $borrow = restore::orderBy('updated_at', 'DESC')->where('user_id', Auth::user()->id)->paginate(5);
        $assets = DB::table('assets')->get();

        return view('manajer_inventaris/Borrowing/rent/index', compact(['borrow', 'assets']));
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
        //
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
    public function destroy(restore $restore)
    {
        //
    }
}