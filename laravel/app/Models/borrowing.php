<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    use HasFactory;

    protected $fillable = [

        'asset_id',
        'borrowing_picture',
        'borrowing_end',
        'borrowing_date' ,
        'description',
        'status',
        'created_at',
        'updated_at',					

    ];
    protected $table = 'borrowings';
}
