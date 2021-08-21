<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academicgroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'picture',
        'department_id',
    ];

    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
