<?php
     
namespace App\Http\Controllers;
    

use Illuminate\Http\Request;
use App\Exports\AssetsExport;
use App\Imports\AssetsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
    
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new AssetsExport, 'AssetList.xlsx');
        
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new AssetsImport,request()->file('file'));
             
        return back();
    }
}