<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'start_date', 'end_date', 'status'];

    public function projectcompanies()
    {
        return $this->hasMany(ProjectCompany::class, 'project_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'project_id');
    }
}
