<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactUs extends Notification
{

    use Queueable;

    private $contactUsModel = [];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\Models\ContactUs $contactUsModel)
    {
        $this->contactUsModel = $contactUsModel;
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
        return (new MailMessage)
                ->replyTo($this->contactUsModel->email)
                ->greeting('New contact us message')
                ->line('From: ' . $this->contactUsModel->name)
                ->line('Email: ' . $this->contactUsModel->email)
                ->line('Phone Number: ' . $this->contactUsModel->phone_number)
                ->line('Message: ' . $this->contactUsModel->message);
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
