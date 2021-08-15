<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
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

     //An laboratory belongs to a depatment
     public function department()
     {
         return $this->belongsTo(Department::class);
     }
 
     // An laboratory has a reponsible
     public function user()
     {
         return $this->belongsTo(User::class);
     }

      // An laboratory has many equipments
      public function equipments()
      {
          return $this->hasMany(Equipment::class);
      }
}
