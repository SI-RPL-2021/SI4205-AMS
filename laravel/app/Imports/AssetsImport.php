<?php

namespace App\Imports;

use App\asset;
use App\Models\Asset as ModelsAsset;
use Maatwebsite\Excel\Concerns\ToModel;

class AssetsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ModelsAsset([
            'name'     => $row['name'],
            'unique_code'    => $row['unique_code'], 
            'asset_purchase_date'    => $row['asset_purchase_date'], 
            'asset_purchase_price'    => $row['asset_purchase_price'], 
            'description'    => $row['description'], 
            'author'    => $row['author'], 
        ]);
    }
}
