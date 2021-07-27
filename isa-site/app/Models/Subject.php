<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
    	'name',
        'code',
    	'description',
        'semester',
        'specialization_id',
        'department_id',
    ];
    public $timestamps = false;

    public function department()
     {
         return $this->belongsTo(Department::class);
     }

     public function specialization()
     {
         return $this->belongsTo(Specialization::class);
     }
}