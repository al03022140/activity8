<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function roboticsKit()
    {
        return $this->belongsTo(RoboticsKit::class);
    }

    // Many-to-many: a course can have many users enrolled
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
