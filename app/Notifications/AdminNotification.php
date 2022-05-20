<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class AdminNotification extends Notification
{
    use Queueable;
    private $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = 'لديك بلاغات جديده';
        return (new MailMessage)
            ->subject(Lang::get(' لديك بلاغات جديده'))
            ->line($message)
            ->action('دعني اراها', $this->data['url'])
            ->line('شكرا');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'project_id' => $this->data['project_id'],
            'project_title' => $this->data['project_title'],
            'url' => $this->data['url'],
            'type' => 'admin',
            'message' => $this->data['message'],
            'userId' => $this->data['userId']
        ];
    }
    public function toArray($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'project_id' => $this->data['project_id'],
                'project_title' => $this->data['project_title'],
                'url' => $this->data['url'],
                'type' => 'admin',
                'message' => $this->data['message'],
                'userId' => $this->data['userId']
            ],
        ];
    }
}