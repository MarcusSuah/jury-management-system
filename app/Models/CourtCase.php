<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourtCase extends Model
{
    use HasFactory;

    protected $table = "court_cases";

    static public function getSingle($id)
    {
        return CourtCase::find($id);
    }

    static public function getRecord()
    {
        return CourtCase::get();
    }
}
