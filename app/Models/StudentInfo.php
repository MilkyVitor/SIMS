<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;

class StudentInfo extends Model
{
    use HasFactory;

    protected $table = 'student_info';

   /**
    * Get the user that owns the StudentInfo
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function classes()
   {
       return $this->belongsTo(Classes::class, 'student_id', 'user_id');
   }
}
