<?php

namespace App\Jobs;

use App\Models\Warrior;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrainingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private Warrior $warrior, private string $skill)
    {}

    public function handle(): void
    {
        $this->warrior->{$this->skill} = $this->warrior->{$this->skill} + 1;
        $this->warrior->save();
    }
}
