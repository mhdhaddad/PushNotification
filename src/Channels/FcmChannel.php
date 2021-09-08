<?php

namespace Mhdhaddad\PushNotification\Channels;

class FcmChannel extends GcmChannel
{
    /**
     * {@inheritdoc}
     */
    protected function pushServiceName()
    {
        return 'fcm';
    }
}
