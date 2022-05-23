<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
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
        $message = 'قام ' . $this->data['name'] . 'بالرد على مشوعك ';
        return (new MailMessage)
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
            'name' => $this->data['name'],
            'post_title' => $this->data['post_title'],
            'url' => $this->data['url'],
            'type' => 'comment',
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
                'name' => $this->data['name'],
                'post_title' => $this->data['post_title'],
                'url' => $this->data['url'],
                'type' => 'comment',
                'message' => $this->data['message'],
                'userId' => $this->data['userId']
            ],
        ];
    }
}