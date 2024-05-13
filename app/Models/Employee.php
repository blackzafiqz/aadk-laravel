<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';
    
    // this declare primary key
    protected $primaryKey = 'id';

    // this declare attributes
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}
