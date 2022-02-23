<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['idcard', 'mobile', 'fname', 'lname',
    'fname_en', 'lname_en', 'uname', 'upass', 'status',
    ];

    public function projcompstudents()
    {
        return $this->hasMany('App\Models\ProjCompStudent', 'student_id');
    }
}
