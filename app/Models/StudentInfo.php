<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;
use App\Models\DocumentRequests;

class StudentInfo extends Model
{
    use HasFactory;

    protected $table = 'student_info';

    public function documentrequests() {
        return $this->hasMany(DocumentRequests::class, 'student_id', 'user_id')->selectRaw('*, updated_at as "DocUpDate"');
    }

}
