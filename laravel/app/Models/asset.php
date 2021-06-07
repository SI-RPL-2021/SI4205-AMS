<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
   use HasFactory;

    protected $fillable = [
        'name',
        'asset_category',
        'asset_purchase_price',
        'asset_purchase_date' ,
        'picture',
        'description',
        'unique_code',
        'status',
       
        // 'deskripsi', 'jumlah_penjualan', 'pendapatan_bersih', 'user_id', 'status'

    ];
    protected $table = 'assets';

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
}
