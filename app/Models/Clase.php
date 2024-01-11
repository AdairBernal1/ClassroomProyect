<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Clase extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'user_clase', 'id_clase','id_user');
    }

    public function tasks(): BelongsToMany{
        return $this->belongsToMany(Task::class, 'task_clase');
    }
}
