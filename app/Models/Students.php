<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id_student';
    protected $fillable = [
        'matricula',
        'name',
        'app',
        'apm',
        'gen',
        'email',
        'password',
        'fn',
        'photo',
        'id_grupo',
    ];
}
