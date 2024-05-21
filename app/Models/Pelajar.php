<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    use HasFactory;
    protected $table = 'pelajar';
    protected $fillable = [
        'no_mykad',
        'nama',
        'email',
        'address_line',
        'alamat_id',
        'kod_sekolah',
    ];
}
