<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chioce extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'name', 'desc', 'result', 'image', 'status'];

    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz', 'id', 'quiz_id');
    }
}
