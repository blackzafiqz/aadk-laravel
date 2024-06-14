<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    use HasFactory;
    protected $table = 'pelajar';
    protected $primaryKey = 'no_mykad';
    protected $keyType = 'string';
    protected $fillable = [
        'no_mykad',
        'nama',
        'email',
        'address_line',
        'alamat_id',
        'kod_sekolah',
    ];
    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'kod_sekolah', 'kod_sekolah');
    }
}
