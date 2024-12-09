<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;
class ProjectAndTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //projets seeders

        Project::create([
            'title' => 'Project A',
            'description' => 'Description for Project A',
            'deadline' => now()->addDays(10),
            'status' => 'En cours',
            'user_id' => 1, // Assurez-vous qu'un utilisateur avec cet ID existe
        ]);

        Project::create([
            'title' => 'Project B',
            'description' => 'Description for Project B',
            'deadline' => now()->addDays(20),
            'status' => 'Terminé',
            'user_id' => 2, // Assurez-vous qu'un utilisateur avec cet ID existe
        ]);
    

    //taches seeders

    Task::create([
        'title' => 'Task 1 for Project A',
        'description' => 'Description for Task 1',
        'status' => 'En cours',
        'priority' => 'haute',
        'project_id' => 1, // Assurez-vous qu'un projet avec cet ID existe
        'assigned_to' => 2, // Assurez-vous qu'un utilisateur avec cet ID existe
    ]);

    Task::create([
        'title' => 'Task 2 for Project B',
        'description' => 'Description for Task 2',
        'status' => 'Non commencé',
        'priority' => 'basse',
        'project_id' => 2, 
        'assigned_to' => 3, 
    ]);


    
}
}