<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $table = 'tache';

    protected $fillable = [
        'titre',
        'priorité',
        'deadline',
        'responsable_id',
    ];
}
