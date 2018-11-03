<?php

namespace App\Notifications;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class PostCreeatedNotification extends Notification
{
    use Queueable;
    use Notifiable;
    public $post;

    public function __construct(Post $post)
    {
        $this->post=$post;
    }


    public function via($notifiable)
    {
       // return ['mail','nexmo'];
        return ['nexmo'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Post ' .$this->post->id.' Created')
                    ->action('Notification Action', url('/posts'))
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content('New post created.Please visit' .url('/posts'));
    }
}
