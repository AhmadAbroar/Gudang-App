<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_merek',
        'nama_type',
        'tahun_rilis',
    ];

    public function merek()
    {
        return $this->belongsTo(Merek::class, 'id_merek');
    }
}
