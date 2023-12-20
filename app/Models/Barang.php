<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_merek',
        'id_type',
        'nama_barang',
        'stok',
        'foto',
    ];

    public function merek()
    {
        return $this->belongsTo(Merek::class, 'id_merek');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }
}
