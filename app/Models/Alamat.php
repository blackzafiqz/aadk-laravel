<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamat';
    protected $fillable = [
        'negeri',
        'daerah',
        'mukim',
        'poskod',
    ];

    public function sekolah()
    {
        return $this->hasMany(Sekolah::class);
    }
}
