<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['company_type_id','name','name_en','desc','addr','province','country','tel','email','contact_name','image','logo','status'];

    public function companytype(){
        return $this->belongsTo(CompanyType::class);
    }

    public function projectcompanies()
    {
        return $this->hasMany(ProjectCompany::class,'company_id');
    }
}
