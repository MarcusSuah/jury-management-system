<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;
    protected $table = "judges";

    static public function getSingle($id)
    {
        return Judge::find($id);
    }

    static public function getRecord()
    {
        return Judge::get();
    }
}
