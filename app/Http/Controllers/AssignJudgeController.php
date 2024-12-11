<?php

namespace App\Http\Controllers;

use App\Models\AssignJudge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class AssignJudgeController extends Controller
{

    public function add()
    {
        $judges = DB::table("judges")->get();
        $courts = DB::table("courts")->get();
        $court_cases = DB::table("court_cases")->get();
        return view("panel/assignment/assign-judge", compact("judges", "courts", "court_cases"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "judge" => "required",
                "court" => "required",
                "case" => "required",
                "start_date" => "required",
                "end_date" => "required",
            ],
            [
                "judge.required" => "Please select a Judge",
                "court.required" => "Please select a Court Name",
                "case.required" => "Please select a Case",
                "start_date.required" => "Please select a Case Start Date",
                "end_date.required" => "Please select a Case End Date",
            ]
        );
        $unique_entry = DB::table("assign_judges")
            ->join('court_cases', 'court_cases.id', 'assign_judges.case_id')
            ->Where('court_cases.status', '!=', 'Finished')
            ->Where('court_cases.id', $request->case)
            ->count();
        if ($unique_entry > 0) {
            return redirect()->back()->with("error", "The case is ongoing, Judge cannot be assigned.");
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with("error", "Judge was not assigned");
        } else {
            $assgn_judge = new AssignJudge();
            $assgn_judge->judge_id = $request->judge;
            $assgn_judge->court_id = $request->court;
            $assgn_judge->case_id = $request->case;
            $assgn_judge->case_start_date = $request->start_date;
            $assgn_judge->case_end_date = $request->end_date;
            $assgn_judge->case_status = (empty($request->status)) ? 0 : 1;
            $assgn_judge->save();
            return redirect()->back()->with("success", "Judge successfully assigned");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function list()
    {
        $data["getRecord"] = AssignJudge::getRecord();
        return view("panel.assignment.list-assign-judge", $data);
    }

    public function viewCases($user_id)
    {
        $data["getRecord"] = DB::table('assign_judges')
            ->join('judges', 'judges.id', '=', 'assign_judges.judge_id')
            ->join('courts', 'courts.id', '=', 'assign_judges.court_id')
            ->join('court_cases', 'court_cases.id', '=', 'assign_judges.case_id')
            ->where('judges.user_id', Auth::user()->id)
            ->distinct('assign_judges.court_id')
            ->get();

        return view("panel.judge.judge-assign-list", $data);
    }
}
