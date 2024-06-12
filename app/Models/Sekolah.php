<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $primaryKey = 'kod_sekolah';
    protected $keyType = 'string';
    protected $fillable = [
        'kod_sekolah',
        'nama',
        'address_line',
        'alamat_id',
    ];
    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }
}
