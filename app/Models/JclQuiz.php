<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JclQuiz extends Model
{
    use HasFactory;

    protected $fillable = ['jcl_section_id', 'quiz_id', 'join_date', 'end_date', 'time_no', 'progress', 'status'];

    public function jclsection()
    {
        return $this->hasOne('App\Models\JclSection', 'id', 'jcl_section_id');
    }

    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz', 'id', 'quiz_id');
    }
}
