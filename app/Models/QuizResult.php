<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    protected $table = 'quiz_results';

    static public function getSingle($id)
    {
        return QuizResult::find($id);
    }

    static public function getRecord()
    {
        return QuizResult::get();
    }
}
