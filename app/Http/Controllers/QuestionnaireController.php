<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Answers;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class QuestionnaireController extends Controller
{
    public function list()
    {
        $data = Questionnaire::getRecord();
        $result = [];
        if (!empty($data)) {
            foreach ($data as $question) {
                $trueAns = Answers::where('questionnaire_id', $question->id)->where('type', 'true')->select('answer')->get();
                $biasedAns = Answers::where('questionnaire_id', $question->id)->where('type', 'biased')->select('answer')->get();
                $wrongAns = Answers::where('questionnaire_id', $question->id)->where('type', 'wrong')->select('answer')->get();
                $result[] = [
                    'questionId' => $question->id,
                    'question' => $question->question,
                    'createdAt' => $question->created_at,
                    'trueAns' => (!empty($trueAns[0])) ? $trueAns[0]->answer : '',
                    'biasedAns' => (!empty($biasedAns[0])) ? $biasedAns[0]->answer : '',
                    'wrongAns1' => (!empty($wrongAns[0])) ? $wrongAns[0]->answer : '',
                    'wrongAns2' => (!empty($wrongAns[1])) ? $wrongAns[1]->answer : '',
                ];
            }
        }
        return view("panel.questionnaire.list", compact('result'));
    }
    public function add()
    {
        return view("panel.questionnaire.add");
    }
    public function insert(Request $request)
    {
        $validatedFields = Validator::make($request->all(), [
            'question'  => ['required', 'string', 'unique:questionnaires'],
            'true_answer' => ['required', 'string', 'max:100'],
            'biased_answer' => ['required', 'string', 'max:100'],
            'wrong_answer_1' => ['required', 'string', 'max:100'],
            'wrong_answer_2' => ['required', 'string', 'max:100'],
        ]);
        if ($validatedFields->fails()) {
            \Session::flash('msgErr', 'Oops! Question was not created, try again.');
            return redirect()->back()->withErrors($validatedFields->errors())->withInput();
        } else {
            // Create Juror user account
            $questionnaire = new Questionnaire;
            $questionnaire->question = $request->question;
            $questionnaire->save();

            // True Answers
            $trueAnswer = new Answers;
            $trueAnswer->questionnaire_id = $questionnaire->id;
            $trueAnswer->type = 'true';
            $trueAnswer->answer = $request->true_answer;
            $trueAnswer->save();

            // Biased Answers
            $biasedAnswer = new Answers;
            $biasedAnswer->questionnaire_id = $questionnaire->id;
            $biasedAnswer->type = 'biased';
            $biasedAnswer->answer = $request->biased_answer;
            $biasedAnswer->save();

            // Wrong Answers
            $wringAnswer1 = new Answers;
            $wringAnswer1->questionnaire_id = $questionnaire->id;
            $wringAnswer1->type = 'wrong';
            $wringAnswer1->answer = $request->wrong_answer_1;
            $wringAnswer1->save();

            $wringAnswer2 = new Answers;
            $wringAnswer2->questionnaire_id = $questionnaire->id;
            $wringAnswer2->type = 'wrong';
            $wringAnswer2->answer = $request->wrong_answer_2;
            $wringAnswer2->save();

            return redirect("panel/questionnaire")->with("success", "Quiz successfully created");
        }
    }
    public function edit($id)
    {
        $question = Questionnaire::getSingle($id);
        $result = [];
        if (!empty($question)) {
            $trueAns = Answers::where('questionnaire_id', $question->id)->where('type', 'true')->get();
            $biasedAns = Answers::where('questionnaire_id', $question->id)->where('type', 'biased')->get();
            $wrongAns = Answers::where('questionnaire_id', $question->id)->where('type', 'wrong')->get();
            $result[] = [
                'questionId' => $question->id,
                'question' => $question->question,
                'trueAns' => (!empty($trueAns[0])) ? $trueAns[0]->answer : '',
                'trueAnsId' => (!empty($trueAns[0])) ? $trueAns[0]->id : '',
                'biasedAns' => (!empty($biasedAns[0])) ? $biasedAns[0]->answer : '',
                'biasedAnsId' => (!empty($biasedAns[0])) ? $biasedAns[0]->id : '',
                'wrongAns1' => (!empty($wrongAns[0])) ? $wrongAns[0]->answer : '',
                'wrongAns1Id' => (!empty($wrongAns[0])) ? $wrongAns[0]->id : '',
                'wrongAns2' => (!empty($wrongAns[1])) ? $wrongAns[1]->answer : '',
                'wrongAns2Id' => (!empty($wrongAns[1])) ? $wrongAns[1]->id : '',
            ];
        }
        return view("panel.questionnaire.edit", compact('result'));
    }

    public function update($id, Request $request)
    {
        $validatedFields = Validator::make($request->all(), [
            'true_answer' => ['required', 'string', 'max:100'],
            'biased_answer' => ['required', 'string', 'max:100'],
            'wrong_answer_1' => ['required', 'string', 'max:100'],
            'wrong_answer_2' => ['required', 'string', 'max:100'],
        ]);
        if ($validatedFields->fails()) {
            \Session::flash('msgErr', 'Oops! Question was not updated, try again.');
            return redirect()->back()->withErrors($validatedFields->errors())->withInput();
        } else {
            $questionnaire = Questionnaire::getSingle($id);
            $questionnaire->question = $request->question;
            $questionnaire->save();


            // True Answers
            $trueAnswer = Answers::getSingle($request->true_answer_id);
            $trueAnswer->answer = $request->true_answer;
            $trueAnswer->save();

            // Biased Answers
            $biasedAnswer = Answers::getSingle($request->biased_answer_id);
            $biasedAnswer->answer = $request->biased_answer;
            $biasedAnswer->save();

            // Wrong Answers
            $wringAnswer1 = Answers::getSingle($request->wrong_answer_1_id);
            $wringAnswer1->answer = $request->wrong_answer_1;
            $wringAnswer1->save();

            $wringAnswer2 = Answers::getSingle($request->wrong_answer_2_id);
            $wringAnswer2->answer = $request->wrong_answer_2;
            $wringAnswer2->save();

            return redirect("panel/questionnaire")->with("success", "Quiz updated successfully ");
        }
    }
    public function delete($id)
    {
        // Delete question related answers
        Answer::where('question_id', $id)->delete();

        // Delete the question
        $save = Questionnaire::getSingle($id);
        $save->delete();
        return redirect("panel/questionnaire")->with("success", "Questionnaire deleted successfully ");
    }
}
