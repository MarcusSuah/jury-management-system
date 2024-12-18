<?php

namespace App\Http\Controllers;

use App\Models\AssignJury;
use App\Models\Juror;
use App\Models\Court;
use App\Models\CourtCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AssignJuryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        $courts = DB::table("courts")->get();
        $court_cases = DB::table("court_cases")->get();
        $jurors = DB::table("jurors")->get();

        return view("panel/assignment/assign-jury", compact("courts", "court_cases", "jurors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "jury" => "required",
                "case" => "required",
                "court" => "required",
            ],
            [
                "jury.required" => "Please select a Jury",
                "case.required" => "Please select a Case",
                "court.required" => "Please select a Court",
            ]
        );
        $unique_entry = DB::table("assign_juries")
            ->Where('juror_id', $request->input('jury'))
            ->Where('court_id', $request->input('court'))
            ->Where('case_id', $request->input('case'))
            ->Where('start_date', $request->input('start_date'))
            ->Where('end_date', $request->input('end_date'))
            ->count();
        if ($unique_entry > 0) {
            return redirect()->back()->with("error", "Case has already been assigned to the Juror");;
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with("error", "Juror was not assigned");
        } else {
            $assgn_jury = new AssignJury();
            $assgn_jury->juror_id = $request->jury;
            $assgn_jury->court_id = $request->court;
            $assgn_jury->case_id = $request->case;
            $assgn_jury->start_date = $request->start_date;
            $assgn_jury->end_date = $request->end_date;
            $assgn_jury->status = (empty($request->status)) ? 0 : 1;
            $assgn_jury->save();
            return redirect()->back()->with("success", "Juror successfully assigned");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function list()
    {
        $data["getRecord"] = AssignJury::getRecord();
        return view("panel.assignment.list-assign-jury", $data);
    }

    /**
     * Method to Display the jury cases
     */
    public function viewCases($user_id)
    {
        $data["getRecord"] = DB::table('assign_juries')
            ->join('jurors', 'jurors.id', '=', 'assign_juries.juror_id')
            ->join('courts', 'courts.id', '=', 'assign_juries.court_id')
            ->join('court_cases', 'court_cases.id', '=', 'assign_juries.case_id')
            ->where('jurors.user_id', Auth::user()->id)
            ->distinct('assign_juries.court_id')
            ->get();

        return view("panel.jury.jury-assign-list", $data);
    }

    /**
     * Display assignment edit form
     */
    public function edit($id)
    {
        $data = AssignJury::getSingle($id);
        $assignedJury = Juror::getSingle($data->juror_id);
        $assignedCourt = Court::getSingle($data->court_id);
        $assignedCase = CourtCase::getSingle($data->case_id);
        $courts = DB::table("courts")->get();
        $court_cases = DB::table("court_cases")->get();
        $jurors = DB::table("jurors")->get();
        return view("panel.assignment.edit-assign-jury", compact("courts", "court_cases", "jurors", "data", "assignedJury", "assignedCourt", "assignedCase"));
    }

    /**
     * Update assignment
     */
    public function update(Request $request, $id)
    {
        $assgn_jury = AssignJury::getSingle($id);
        $assgn_jury->juror_id = $request->jury;
        $assgn_jury->court_id = $request->court;
        $assgn_jury->case_id = $request->case;
        $assgn_jury->start_date = $request->start_date;
        $assgn_jury->end_date = $request->end_date;
        $assgn_jury->status = (empty($request->status)) ? 0 : 1;
        $assgn_jury->save();
        return redirect('/panel/assignjury/list')->with("success", "Juror assignment successfully updated");
    }
}
