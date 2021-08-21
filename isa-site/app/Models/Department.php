<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'picture',
    ];
    public $timestamps = false;

    //A department has many specializations
    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }

    //A department has many users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //A department has many openings
    public function jobopenings()
    {
        return $this->hasMany(JobOpening::class);
    }

    //A department has many laboratories
    public function laboratories()
    {
        return $this->hasMany(Laboratory::class);
    }

    //A department has many academicgroups
    public function academicgroups()
    {
        return $this->hasMany(Academicgroup::class);
    }

    //A department has many courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    //A department has many information
    public function informations()
    {
        return $this->hasMany(Information::class);
    }
}
