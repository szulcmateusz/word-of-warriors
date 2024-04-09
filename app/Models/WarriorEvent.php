<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarriorEvent extends Model
{
    use HasFactory;

    protected $fillable = ['warrior_id', 'action', 'end_date'];

    public function warrior() {
        return $this->belongsTo(User::class);
    }
}
