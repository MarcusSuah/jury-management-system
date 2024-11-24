<?php

namespace App\Http\Controllers;

use App\Models\AssignQuiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AssignJury;
use App\Models\Questionnaire;
use App\Models\Answers;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizResult;

class AssignQuizController extends Controller
{
    /**
     * Display quizmAssignment Form.
     */
    public function quizAssignmentForm()
    {
        $jurors = User::getAllUsers();
        $users = [];
        if(!empty($jurors)){
            foreach($jurors as $user){
                if($user->hasRole('jury')){
                    $checkQuzAssigment = DB::table('assign_quizzes')
                    ->where('user_id', $user->id)
                    ->where('status', '!=', 'completed')
                    ->count();
                    if($checkQuzAssigment == 0){
                        $users[] = [
                            'id' => $user->id,
                            'email' => $user->name.' | '.$user->email,
                        ];
                    }
                }
            }
        }
        return view("panel.questionnaire.assign-quiz", compact('users'));
    }

    /**
     * Assign Quiz To Juror
     */
    public function assignQuizToJuror(Request $request)
    {
        // Create Assign Quiz
        $assgnQuiz = new AssignQuiz;
        $assgnQuiz->user_id = $request->user_id;
        $assgnQuiz->status = 'pending';
        $assgnQuiz->save();
        return redirect("panel/view/quiz-assigment")->with("success", "Quiz successfully assigned");
    }

    /**
     * View All Quiz Assignments
     */
    public function viewQuizAssignment()
    {
        $assignments = DB::table('assign_quizzes')
        ->join('users','users.id','=','assign_quizzes.user_id')
        ->select('assign_quizzes.id','assign_quizzes.status','assign_quizzes.created_at','users.name','users.email')
        ->get();
        $result = [];
        
        if(!empty($assignments)){
            foreach($assignments as $assignment){
                $score = '-';
                $comment = '-';
                if($assignment->status == 'completed'){
                    $quizResult =  QuizResult::where('assign_quiz_id', $assignment->id)->first();
                    $comment = (!empty($quizResult->status)) ? $quizResult->status : '-';

                    //Calculate User Score
                    if(!empty($quizResult)){
                        $score = $quizResult->score/10 * 100 .'%';
                    }
                }
                $result[] = [
                    'status' => $assignment->status,
                    'created_at' => $assignment->created_at,
                    'name' => $assignment->name,
                    'email' => $assignment->email,
                    'comment' => $comment,
                    'score' => $score,
                ];
            }
        }
        return view("panel.questionnaire.assign-quiz-list", compact('result'));
    }

    /**
     * View User Pending Quiz
     */
    public function viewPendingQuiz()
    {
        $assignment = AssignQuiz::where('user_id', Auth::user()->id)->where('status','pending')->get();
        return view("panel.questionnaire.view-pending-quiz", compact('assignment'));
    }

    /**
     * Attempt Quiz
     */
    public function attemptQuiz(Request $request)
    {
        $quiz = AssignQuiz::getSingle($request->assignment_id);
        $quiz->status = 'attempted';
        $quiz->save();
        //return redirect("panel/start-quiz");
        return view("panel.questionnaire.quiz");
    }

     /**
     * Start Quiz
     */
    public function startQuiz()
    {
        return view("panel.questionnaire.quiz");
    }

     /**
     * Get the Quiz Questions and Answers
     */
    public function getQuiz()
    {
        $questions = DB::table('questionnaires')->limit(10)->get();
        $assignment = AssignQuiz::where('user_id', Auth::user()->id)->where('status', 'attempted')->latest('id')->first();
        $result = [];
        if(!empty($questions) && !empty($assignment)){
            foreach($questions as $question){
                $ans = [];
                $answers = Answers::where('questionnaire_id', $question->id)->get();
                if(!empty($answers)){
                    foreach($answers as $answer){
                        if($answer->type == 'true'){
                            $ans['true'] = $answer->answer;
                        }elseif($answer->type == 'biased'){
                            $ans['biased'] = $answer->answer;
                        }else{
                            $ans['wrong'][] = $answer->answer;
                        }
                    }
                }
                $result[] = [
                    'question' => $question->question,
                    'answers' => $ans,
                    'assignment_id' => $assignment->id,
                ];
            }
        }
        $result_json = json_encode($result, JSON_UNESCAPED_UNICODE);
        echo $result_json; die;
    }
}
