<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    use HasFactory;

    protected $fillable = [

        // 'asset_id',
        'borrowing_date' ,
        'description',
        'period',
        'status',				

    ];
    protected $table = 'borrowings';

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
