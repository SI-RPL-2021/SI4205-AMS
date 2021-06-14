<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'asset_id',
        'borrowing_date',
        'return_date',
        'jenis_laporan' ,
        'biaya',
        'author',
        
       
        // 'deskripsi', 'jumlah_penjualan', 'pendapatan_bersih', 'user_id', 'status'

    ];
    public $table = 'histories';
     public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
