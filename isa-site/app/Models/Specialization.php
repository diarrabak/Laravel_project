<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'picture',
        'user_id',
        'department_id',
    ];
    public $timestamps = false;

    //An option belongs to a depatment
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // An option has a reponsible
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
