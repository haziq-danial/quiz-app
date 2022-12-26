<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'QuestionID';

    protected $fillable = [
        'question',
        'answer',
        'marks',
        'weightage'
    ];
}
