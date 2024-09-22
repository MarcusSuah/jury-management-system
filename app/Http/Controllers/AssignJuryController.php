<?php

namespace App\Http\Controllers;

use App\Models\AssignJury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
     * Display the specified resource.
     */
    public function show(AssignJury $assignJury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignJury $assignJury)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignJury $assignJury)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignJury $assignJury)
    {
        //
    }
}
