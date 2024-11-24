<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    protected $table = "answers";

    static public function getSingle($id)
    {
        return Answers::find($id);
    }

    static public function getRecord()
    {
        return Answers::get();
    }
    public function Questionnaire()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }
}
