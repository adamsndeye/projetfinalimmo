<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\contact;


class NewContactSend extends Notification
{
    use Queueable;
    protected $contact;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Contact $contact )
    {
        $this->contact=$contact;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'contactnom' => $this->contact->nom,
            'contactid' => $this->contact->id,
             'contacttelephone' => $this->contact->telephone,
              'contactemail' => $this->contact->email,
               'contactmessage' => $this->contact->message,

        ];
    }
}
