<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Les attributs mass assignable (autorisation pour insertion).
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'project_id', // Identifiant du projet parent
        'assigned_to', // Utilisateur assigné
    ];

    /**
     * Relation : Une tâche appartient à un projet.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relation : Une tâche peut être assignée à un utilisateur.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}

