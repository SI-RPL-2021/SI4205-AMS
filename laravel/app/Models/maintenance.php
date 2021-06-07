<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'asset_damage',
        'asset_age',
        'maintenance_bill' ,
        'damage_status',


    ];
    protected $table = 'maintenances';
       
}
