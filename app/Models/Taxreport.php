<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxreport extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jenis_pajak',
        'jumlah_omset',
        'user_id'
    ];
}
