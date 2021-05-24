<?php

namespace App\Models;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;


    protected $fillable = [
        'description',
        'report_date'


    ];

    protected $table = 'maintenances';

    public function assets()
    {
        return $this->belongsTo(Asset::class);
    }
}
