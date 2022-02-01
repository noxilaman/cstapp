<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCompany extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','company_id','join_date','end_date','status'];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function projectcompstudents()
    {
        return $this->hasMany(ProjCompStudent::class,'project_company_id');
    }

    
}
