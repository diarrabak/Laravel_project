<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'title',
        'biography',
        'picture',
        'research_gate',
        'google_scholar',
        'department_id',
        'academicgroup_id',
        'password',
    ];

    public $timestamps = false;

    // A user is reponsible for one specialization
    public function specialization()
    {
        return $this->hasOne(Specialization::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function academicgroup()
    {
        return $this->belongsTo(Academicgroup::class);
    }

    //A user can have many roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
