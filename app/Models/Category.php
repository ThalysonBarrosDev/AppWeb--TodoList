<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'color'
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
