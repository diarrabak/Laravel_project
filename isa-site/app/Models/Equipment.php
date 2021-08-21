<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'picture',
        'laboratory_id',
    ];
    public $timestamps = false;

    //An equipment belongs to a laboratory
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }
}
