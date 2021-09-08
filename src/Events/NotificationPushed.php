<?php

namespace Mhdhaddad\PushNotification\Events;

use Mhdhaddad\PushNotification\PushNotification;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationPushed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \Mhdhaddad\PushNotification\PushNotification
     */
    public $push;

    /**
     * Create a new event instance.
     *
     * @param  \Mhdhaddad\PushNotification\PushNotification $push
     */
    public function __construct(PushNotification $push)
    {
        $this->push = $push;
    }
}
