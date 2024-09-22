<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juror extends Model
{
    use HasFactory;
    protected $table = "jurors";

    static public function getSingle($id)
    {
        return Juror::find($id);
    }

    static public function getRecord()
    {
        return Juror::get();
    }
}
