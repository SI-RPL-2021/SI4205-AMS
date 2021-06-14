<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\History;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::orderBy('updated_at', 'DESC')->paginate(5);
        $categories = Category::all();
        $history = History::orderBy('id', 'DESC');
        return view('manajer_inventaris/history/index', (compact('assets', 'categories', 'history')));
    }
    public function updateindex($id, Request $request)
    {
        $assets = Asset::find($id);
        $categories = Category::all();
        $history = History::all()->where('asset_id',$id);
        return view('manajer_inventaris/history/update', compact('assets', 'categories','history'));
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
    public function search()
    {
        $search_text = $_GET['search2'];
        $assets = asset::where('name', 'LIKE', '%' . $search_text . '%')->paginate(5);
        $categories = DB::table('categories')->get();
        return view('manajer_inventaris/History/index', compact('assets', 'categories'));
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
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }
}
