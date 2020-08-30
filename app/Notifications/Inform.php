<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Inform extends Notification
{
    use Queueable;

    private $user;
    private $text;
    private $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, string $subject, string $text)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->text = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown(
            'vendor.notifications.email',
            [
                'name'  =>  $this->user->name,
                'text' => $this->text
            ]
        )->subject($this->subject);
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
            //
        ];
    }
}
