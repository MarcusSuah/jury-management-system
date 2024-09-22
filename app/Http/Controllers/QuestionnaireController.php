<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function list()
    {
        $data["getRecord"] = Questionnaire::getRecord();
        return view("panel.questionnaire.list", $data);
    }
    public function add()
    {
        return view("panel.questionnaire.add");
    }
    public function insert(Request $request)
    {
        $save = new Questionnaire;
        $save->questionnaire_title = $request->name;
        $save->case_number = $request->case_number;
        $save->questionnaire = $request->questionnaire;
        $save->save();
        return redirect("panel/questionnaire")->with("success", "Questionnaire successfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = Questionnaire::getSingle($id);
        return view("panel.questionnaire.edit", $data);
    }

    public function update($id, Request $request)
    {
        $save = Questionnaire::getSingle($id);
        $save->questionnaire_title = $request->questionnaire_title;
        $save->case_number = $request->case_number;
        $save->questionnaire = $request->questionnaire;
        $save->save();
        return redirect("panel/questionnaire")->with("success", "Questionnaire updated successfully ");
    }
    public function delete($id)
    {
        $save = Questionnaire::getSingle($id);
        $save->delete();
        return redirect("panel/questionnaire")->with("success", "Questionnaire deleted successfully ");
    }
}
