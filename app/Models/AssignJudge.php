<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\Judge;

class AssignJudge extends Model
{
    use HasFactory;
    protected $table = 'assign_judges';
    protected $fillable = [
        'judge_id',
        'court_id',
        'case_id',
        'case_start_date',
        'case_end_date',
        'case_status'
    ];
    static public function getSingle($id)
    {
        return AssignJudge::find($id);
    }

    static public function getRecord()
    {
        return AssignJudge::get();
    }

    public function Court()
    {
        return $this->belongsTo(Court::class, 'court_id');
    }
    public function Judge()
    {
        return $this->belongsTo(Judge::class, 'judge_id');
    }
    public function Case()
    {
        return $this->belongsTo(CourtCase::class, 'case_id');
    }
}
