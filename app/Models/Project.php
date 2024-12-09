<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Les attributs mass assignable (autorisation pour insertion).
     */
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'status',
        'user_id', // Identifiant du propriétaire du projet
    ];
    

    /**
     * Relation : Un projet appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation : Un projet peut avoir plusieurs tâches.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
