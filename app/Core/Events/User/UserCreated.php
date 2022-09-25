<?php

namespace App\Core\Events\User;

use App\Core\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreated implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public User $user
    ) {
    }

    public function broadcastAs(): string
    {
        return 'user.created';
    }

    public function broadcastOn(): Channel
    {
        return new PresenceChannel(
            'user.'.$this->user->getRouteKey()
        );
    }
}
