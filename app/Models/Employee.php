<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=[  
        'first_name',
        'family_name',
        'middle_name',
        'gender',
        'salary'
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'employee_department', 'employee_id', 'department_id');
    }
}

