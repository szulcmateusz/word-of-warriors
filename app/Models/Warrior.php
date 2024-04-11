<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Warrior extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): HasOne
    {
        return $this->hasOne(WarriorEvent::class);
    }

    public function scopeRankingPosition()
    {
        $value = Warrior::where('name', $this->name)->first()->points;
        $position = Warrior::where('points', '>', $value)->count() + 1;

        return $position;
    }
}
