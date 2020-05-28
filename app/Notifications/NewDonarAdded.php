<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Carbon\carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;

class NewDonarAdded extends Notification
{
    use Queueable;
    public $notification;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification= $notification;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
       
        return [
           'notification'=>$this->notification,
           'user'=>$notifiable
        ];
    }


    public function toBroadcast($notifiable)
    {
       
        return new BroadcastMessage( [
           'notification'=>$this->notification,
           'user'=>$notifiable
        ]);
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
