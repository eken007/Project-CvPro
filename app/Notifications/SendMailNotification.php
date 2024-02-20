<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendMailNotification extends Notification
{
    use Queueable;

    public $employee;

    public $employee_prenom;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($employee, $employee_prenom)
    {
        $this->employee = $employee;
        $this->employee_prenom = $employee_prenom;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $notifiable->name.' '.$notifiable->prenom.' '.'l\'employe(e)'.' '.$this->employee. ' '.$this->employee_prenom.' '.'vient de postuler a votre offre d\'emploie'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage(
            [
                'title' => $notifiable->name.' '.'l\'employe(e)'.' '.$this->employee. ' '.$this->employee_prenom.' '.'vient de postuler a votre offre d\'emploie'
            ]
        );
    }
}
