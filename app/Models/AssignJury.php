<?php

namespace App\Models;

use App\Models\Court;
use App\Models\Juror;
use App\Models\CourtCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignJury extends Model
{
    use HasFactory;
    protected $table = 'assign_juries';
    protected $fillable = [
        'court_id',
        'juror_id',
        'case_id',
        'start_date',
        'end_date',
        'status'
    ];
    static public function getSingle($id)
    {
        return AssignJury::find($id);
    }

    static public function getRecord()
    {
        return AssignJury::get();
    }

    public function Court()
    {
        return $this->belongsTo(Court::class, 'court_id');
    }
    public function Jury()
    {
        return $this->belongsTo(Juror::class, 'juror_id');
    }
    public function Case()
    {
        return $this->belongsTo(CourtCase::class, 'case_id');
    }
}
