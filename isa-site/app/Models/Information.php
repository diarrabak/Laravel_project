<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'document',
        'semester',
        'department_id',
    ];
    public $timestamps = false;

    //An information belongs to a department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
