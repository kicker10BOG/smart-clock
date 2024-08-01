<?php

namespace App\Events;

use App\Models\Clock;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AlarmDeleted implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $alarm_id;
    public $clock;

    /**
     * Create a new event instance.
     */
    public function __construct(Int $alarm_id, Clock $clock)
    {
        $this->alarm_id = $alarm_id;
        $this->clock = $clock;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel("clock.{$this->clock->id}"),
        ];
    }
}
