<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    use HasFactory;  
    
    protected $fillable = [
        'borrowing_picture',
        'borrowing_date',
        'description' ,
        'status',
       
        // 'deskripsi', 'jumlah_penjualan', 'pendapatan_bersih', 'user_id', 'status'

    ];
    protected $table = 'borrowings';
}
