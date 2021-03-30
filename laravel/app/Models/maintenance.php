<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'asset_demage',
        'asset_age',
        'maintenance_bill' ,
        'demage_status',


    ];
    protected $table = 'maintenances';
       
}
