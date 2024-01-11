<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'autism_lvl',
        'pathImg'
    ];

    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'user_task', 'id_user','id_task');
    }
    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'task_clase', 'id_task','id_clase');
    }
}
