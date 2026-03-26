<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =
    [
        'name',
        'workspace_id',
        'user_id',
    ];
}
