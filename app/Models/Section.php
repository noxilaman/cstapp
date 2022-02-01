<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id','seq','name','desc','link_clip','image','status'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
}
