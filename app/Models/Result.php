<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $primaryKey = 'ResultID';

    protected $fillable = [
        'StudentID',
        'depression_scale',
        'anxiety_scale',
        'stress_scale'
    ];
}
