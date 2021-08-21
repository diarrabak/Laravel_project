<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobopening extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'department_id',
    ];
    public $timestamps = false;

    //An opening belongs to a department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
