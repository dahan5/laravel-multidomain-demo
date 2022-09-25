<?php

namespace App\Core\Events\Tenant;

use App\Core\Models\Tenant;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TenantDeleted implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public Tenant $tenant
    ) {
    }

    public function broadcastAs(): string
    {
        return 'tenant.deleted';
    }

    public function broadcastOn(): Channel
    {
        return new PresenceChannel(
            'tenant.'.$this->user->getRouteKey()
        );
    }
}
