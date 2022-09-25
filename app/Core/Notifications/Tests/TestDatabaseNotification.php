<?php

namespace App\Core\Notifications\Tests;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class TestDatabaseNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function via(mixed $notifiable): array
    {
        return [
            'database',
        ];
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'message' => __('Test for the database notification.'),
            'type' => 'succes',
        ];
    }
}
