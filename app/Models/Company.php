<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['company_type_id', 'name', 'name_en', 'desc', 'addr', 'province', 
    'country', 'tel', 'email', 'contact_name', 'image', 'logo', 'status',
    'upass', 'uname', 
    'addr2','tumbon','city',
    'website','contact_sex', 'contact_position', 'contact_tel'
    ];

    public function companytype()
    {
        return $this->hasOne('App\Models\CompanyType', 'id', 'company_type_id');
    }

    public function projectcompanies()
    {
        return $this->hasMany('App\Models\ProjectCompany', 'company_id');
    }
}
