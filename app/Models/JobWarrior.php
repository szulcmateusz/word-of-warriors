<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobWarrior extends Model
{
    use HasFactory;

    protected $table = 'jobs_warriors';
    protected $fillable = ['warrior_id', 'job_id', 'action', 'end_date'];

    public function warrior() {
        return $this->belongsTo(User::class);
    }
}
