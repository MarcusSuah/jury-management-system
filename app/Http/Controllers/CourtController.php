<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class CourtController extends Controller
{
    public function dashboard()
    {
        // Get Courts count
        $courts = DB::table("courts")->count();
        $judges = DB::table("judges")->count();
        $court_cases = DB::table("court_cases")->count();
        $jurors = DB::table("jurors")->count();
        $summons = DB::table("summons")->count();
        $questionnaires = DB::table("questionnaires")->count();
        $jury_summons = DB::table("summons")->Where("category", 'Jury')->count();
        $others_summons = DB::table("summons")->Where("category", 'Others')->count();

        return view("panel.court", Compact('courts', 'judges', 'court_cases', 'jurors', 'summons', 'questionnaires', 'jury_summons', 'others_summons'));
    }

    public function list()
    {
        $data["getRecord"] = Court::getRecord();
        return view("panel.court.list", $data);
    }
    public function add()

    {
        return view("panel.court.add");
    }

    public function insert(Request $request)
    {
        $save = new Court;
        $save->name = $request->name;
        $save->type = $request->type;
        $save->location = $request->location;
        $save->category = $request->category;
        $save->save();
        return redirect("panel/court")->with("success", "Court successfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = Court::getSingle($id);
        return view("panel.court.edit", $data);
    }

    public function update($id, Request $request)
    {
        $save = Court::getSingle($id);
        $save->name = $request->name;
        $save->type = $request->type;
        $save->location = $request->location;
        $save->category = $request->category;
        $save->save();
        return redirect("panel/court")->with("success", "Court updated successfully ");
    }
    public function delete($id)
    {
        $save = Court::getSingle($id);
        $save->delete();
        return redirect("panel/court")->with("success", "Court deleted successfully ");
    }
}
