<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_distributor',
        'alamat_distributor',
        'telp_distributor',
    ];

    protected $primaryKey = 'id_distributor'; 
}
