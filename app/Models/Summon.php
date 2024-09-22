<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summon extends Model
{
    use HasFactory;
    protected $table = "summons";

    static public function getSingle($id)
    {
        return Summon::find($id);
    }

    static public function getRecord()
    {
        return Summon::get();
    }
}
