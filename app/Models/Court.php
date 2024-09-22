<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $table = "courts";

    static public function getSingle($id)
    {
        return Court::find($id);
    }

    static public function getRecord()
    {
        return Court::get();
    }
}
