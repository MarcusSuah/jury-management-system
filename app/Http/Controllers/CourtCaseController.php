<?php

namespace App\Http\Controllers;

use App\Models\CourtCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourtCaseController extends Controller
{
    public function list()
    {
        $data["getRecord"] = CourtCase::getRecord();
        $finished_case = CourtCase::where('status', 'Finished')->count();
        $pending_case = CourtCase::where('status', 'Pending')->count();
        $ongoing_case = CourtCase::where('status', 'Ongoing')->count();
        $important_case = CourtCase::where('status', 'Important')->count();
        return view("panel.case.list", $data, compact('finished_case','pending_case','ongoing_case','important_case'));
    }
    public function add()
    {
        return view("panel.case.add");
    }
    public function store(Request $request)
    {
        $request->validate([

            'case_no' => 'required|case_no|unique:court_case',
            'title' => 'required',
            'case_type' => 'required',
            'court_date' => 'required',
            'status' => 'required',
        ]);

        CourtCase::add($request->all());
        return redirect()->route('panel/case')->with('success', 'Case successfully created');
    }
    public function insert(Request $request)
    {
        $save = new CourtCase;
        $save->case_no = $request->case_no;
        $save->title = $request->title;
        $save->case_type = $request->case_type;
        $save->court_date = $request->court_date;
        $save->status = $request->status;
        $save->save();
        return redirect("panel/case")->with("success", "case successfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = CourtCase::getSingle($id);
        
        return view("panel.case.edit", $data);
    }

    public function update($id, Request $request)
    {
        $save = CourtCase::getSingle($id);
        $save->case_no = $request->case_no;
        $save->title = $request->title;
        $save->case_type = $request->case_type;
        $save->court_date = $request->court_date;
        $save->assig_judge = $request->assig_judge;
        $save->status = $request->status;
        $save->save();
        return redirect("panel/case")->with("success", "Case updated successfully ");
    }
    public function delete($id)
    {
        $save = CourtCase::getSingle($id);
        $save->delete();
        return redirect("panel/case")->with("success", "Case deleted successfully ");
    }
}
