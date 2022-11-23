<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'seq', 'name', 'desc', 'status',
        'cert_img_th', 'cert_img_en',
        'name_th_x', 'name_th_y', 'name_en_x', 'name_en_y',
        'logo_th_x', 'logo_th_y', 'logo_en_x', 'logo_en_y',
        'link_clip'
    ];

    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id');
    }
}
