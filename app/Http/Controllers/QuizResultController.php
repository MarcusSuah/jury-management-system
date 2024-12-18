<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use App\Models\AssignQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizResultController extends Controller
{
    /**
     * Submit Juror Quiz Result
     */
    public function submitResult(Request $request)
    {
        $result = new QuizResult;
        $result->assign_quiz_id = $request->assignmentID;
        $result->status = $request->status;
        $result->score = $request->score;
        $result->save();

        $assignment = AssignQuiz::getSingle($request->assignmentID);
        $attempted_updated_time = $assignment->updated_at;

        $assignment->status = 'completed';
        $assignment->updated_at = $attempted_updated_time;
        $assignment->update();

        echo json_encode(['msg' => 'success']);
        die;
    }

    /**
     * Show the Quiz Records
     */
    public function quizRecords()
    {
        if (Auth::user()->hasRole('jury')) {
            $assignments = AssignQuiz::where('user_id', Auth::user()->id)->get();
            $record = [];
            if (!empty($assignments)) {
                foreach ($assignments as $assignment) {
                    $result = QuizResult::where('assign_quiz_id', $assignment->id)->first();
                    $score = '-';
                    if (!empty($result)) {
                        $score = $result->score / 10 * 100 . '%';
                    }

                    $record[] = [
                        'exam_score' => $score,
                        'comment' => (!empty($result->status)) ? $result->status : '-',
                        'status' => (!empty($assignment->status)) ? $assignment->status : '-',
                        'start_time' => (!empty($assignment)) ? $assignment->updated_at : '-',
                        'end_time' => (!empty($result->created_at)) ? $result->created_at : '-',
                    ];
                }
            }
            return view('panel.questionnaire.quiz-records', compact('record'));
        } else {
            abort(403, 'Unauthorized access.');
        }
    }
}
