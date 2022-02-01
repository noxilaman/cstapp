<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjCompStudent extends Model
{
    use HasFactory;

    protected $fillable = ['project_company_id','student_id','join_date','end_date','progress','status'];

    public function projectcompany()
    {
        return $this->belongsTo(ProjectCompany::class,'project_company_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

}
