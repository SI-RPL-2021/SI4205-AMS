<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\History;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // mengambil data dari table asset
        $assets = Asset::orderBy('updated_at', 'DESC')->where('status', 1)->paginate(5);
        $categories = Category::all();

        return view('manajer_inventaris/Input_Asset/index', compact('assets', 'categories'));
    }

    public function count()
    {
        // mengambil data dari table asset
        $count = asset::all()->count();

        return view('/welcome', compact('count'));
    }
    public function index2()
    {
        // mengambil data dari table asset


        $assets = Asset::orderBy('updated_at', 'DESC')->where('status', 0)->paginate(5);
        $categories = Category::all();






        return view('manajer_inventaris/approval/index', compact('assets', 'categories'));
    }
    public function updateindex($id, Request $request)
    {
        $assets = Asset::find($id);
        $categories = Category::all();
        return view('manajer_inventaris/Input_Asset/update', compact('assets', 'categories'));
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
            'name' => 'required',
            'asset_category' => 'required',
            'asset_purchase_price' => 'required',
            'asset_purchase_date' => 'required',
            'picture' => 'required',
            'description' => 'nullable',
            'qty' => 'required',
        ]);

        // file upload
        $file = $request->file('picture');
        $fileName = rand() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images/uploads', $fileName);
        $file->move('images/uploads', $fileName);


        if (Auth::user()->role != 'karyawan') {
            $asset = new Asset;
            $asset->name = $request['name'];
            $asset->unique_code = 'A' . mt_rand(1000, 9000);
            $asset->picture = $path;
            $asset->asset_purchase_date = $request['asset_purchase_date'];
            $asset->asset_purchase_price = $request['asset_purchase_price'];
            $asset->description = $request['description'];
            $asset->qty = $request['qty'];
            $asset->author = Auth::user()->name;
            $asset->status = '1';

            $asset->save();
        } else {
            $asset = new Asset;
            $asset->name = $request['name'];
            $asset->unique_code = 'A' . mt_rand(1000, 9000);
            $asset->picture = $path;
            $asset->asset_purchase_date = $request['asset_purchase_date'];
            $asset->asset_purchase_price = $request['asset_purchase_price'];
            $asset->description = $request['description'];
            $asset->qty = $request['qty'];
            $asset->author = Auth::user()->name;
            $asset->status = '0';

            $asset->save();
        }
        // $history = new History;
        // $history->asset_id = $request['qty'];
        // $history-> save();



        // $category = Category::find($request['asset_category']);
        $asset->categories()->attach($request['asset_category']);

        return redirect('/manajer_inventaris/Input_Asset/index')->with('success', 'Asset Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $asset = Asset::find($id);




        if ($request->hasFile('picture')) {
            // file upload
            $file = $request->file('picture');
            $fileName = rand() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images/uploads', $fileName);
            $file->move('images/uploads', $fileName);
        } else {

            $path = $asset->picture;
        }

        if (Auth::user()->role == 'admin') {
            $asset->name = $request['name'];
            $asset->unique_code = $request['unique_code'];
            $asset->picture = $path;
            $asset->asset_purchase_date = $request['asset_purchase_date'];
            $asset->asset_purchase_price = $request['asset_purchase_price'];
            $asset->description = $request['description'];
            $asset->qty = $request['qty'];
            $asset->status = $request['status'];
        } else {
            $asset->name = $request['name'];
            $asset->unique_code = $request['name'];
            $asset->picture = $path;
            $asset->asset_purchase_date = $request['asset_purchase_date'];
            $asset->asset_purchase_price = $request['asset_purchase_price'];
            $asset->description = $request['description'];
            $asset->qty = $request['qty'];
        }




        $asset->save();

        $asset->categories()->attach($request['asset_category']);

        return redirect(route('asset.show'))->with('success', 'Asset Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data asset berdasarkan id yang dipilih
        DB::table('assets')->where('id', $id)->delete();
        // alihkan halaman ke halaman asset
        return redirect('manajer_inventaris/Input_Asset/index')->with('danger', 'Asset Berhasil Dihapus');;
    }
    public function search()
    {
        $search_text = $_GET['search'];
        $assets = asset::where('name', 'LIKE', '%' . $search_text . '%')->paginate(5);
        $categories = DB::table('categories')->get();
        return view('manajer_inventaris/Input_Asset/index', compact('assets', 'categories'));
    }
    public function tambah($a, $b)
    {
        $total = $a + $b;
        return $total;
    }
}
