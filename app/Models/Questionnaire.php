<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $table = "questionnaires";

    static public function getSingle($id)
    {
        return Questionnaire::find($id);
    }

    static public function getRecord()
    {
        return Questionnaire::get();
    }
}
