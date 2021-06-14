<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restore extends Model
{
  use HasFactory;

    protected $fillable = [

        // 'borrowing_id',
        'return_picture',
        'return_date' ,
        'description',
        'status',				

    ];
    protected $table = 'restores';

    public function borrowing()
    {
        return $this->belongsTo(borrowing::class);
    }
}
