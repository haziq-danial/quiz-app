<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasFactory;

    protected $primaryKey = 'CounselorID';

    protected $fillable = [
        'UserID',
        'staff_id'
    ];
}
