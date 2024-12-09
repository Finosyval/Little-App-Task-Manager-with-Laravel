<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Task;
class TaskAssigned extends Notification
{
    use Queueable;
    public $task;
    /**
     * Create a new notification instance.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
              // Incrémenter le compteur de notifications non lues pour l'utilisateur assigné
    $notifiable->increment('unread_notifications_count');



        return (new MailMessage)
                    ->subject('Nouvelle tâche assignée')
                    ->line("Une nouvelle tâche vous a été assignée : {$this->task->title}.")
                    
                    ->line('Merci de faire partie de notre plateforme !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
