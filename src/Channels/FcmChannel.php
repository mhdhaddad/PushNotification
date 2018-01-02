<?php

namespace Edujugon\PushNotification\Channels;

use Edujugon\PushNotification\Messages\PushMessage;
use Illuminate\Notifications\Notification;

class FcmChannel extends PushChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $to = $notifiable->routeNotificationFor('Fcm')) {
            return;
        }

        $message = $notification->toFcm($notifiable);

        if (is_string($message)) {
            $message = new PushMessage($message);
        }

        $data = [
            'notification' => [
                'title' => $message->title,
                'body' => $message->body,
                'sound' => $message->sound,
            ],
        ];

        if (! empty($message->extra)) {
            $data['data'] = $message->extra;
        }

        return $this->push('fcm', $to, $data, $message);
    }
}
