<?php

namespace App\Exports;

use App\asset;
use App\Models\Asset as ModelsAsset;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetsExport implements FromCollection , WithHeadings  ,WithStyles , ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            '#',
            'Unique_code',
            'Asset Name',
            'asset_purchase_date',
            'asset_purchase_price',
            'description',
            'author',
        ];
    }
    public function styles(Worksheet $sheet)
    {
     
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'C'  => ['font' => ['size' => 12]],
        ];
    }
    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 20,
    //         'B' => 45, 
    //         'C' => 45,
    //         'D' => 35,  
    //         'E' => 55,
    //         'F' => 45,             
    //     ];
    // }
    public function collection()
    {
        return ModelsAsset::select('id','unique_code','name','asset_purchase_date','asset_purchase_price','description','author')->get();
    }
}
