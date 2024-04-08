<?php

class ProcessUserJob implements ShouldQueue
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function handle()
    {
        // Logika zadania, możesz użyć $this->userId
    }
}
