<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'seq', 'name', 'desc', 'link_clip', 'image', 'ans_desc', 'status'];

    public function section()
    {
        return $this->hasOne('App\Models\Section', 'id', 'section_id');
    }

    public function choices()
    {
        return $this->hasMany('App\Models\Chioce', 'quiz_id');
    }

    public function choicecorrect()
    {
        return $this->choices()->where('result', 1)->get();
    }
}
