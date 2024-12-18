<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class AssignQuiz extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'assign_quizzes';

    static public function getSingle($id)
    {
        return AssignQuiz::find($id);
    }

    static public function getRecord()
    {
        return AssignQuiz::get();
    }
}
