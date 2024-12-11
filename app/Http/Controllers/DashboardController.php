<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->hasRole('superadmin')) {
            // Get Courts count
            $courts = DB::table("courts")->count();
            $judges = DB::table("judges")->count();
            $court_cases = DB::table("court_cases")->count();
            $jurors = DB::table("jurors")->count();
            $male = DB::table("jurors")->where('gender', 'Male')->count();
            $female = DB::table("jurors")->where('gender', 'Female')->count();
            $summons = DB::table("summons")->count();
            $questionnaires = DB::table("questionnaires")->count();
            $jury_summons = DB::table("summons")->Where("category", 'Jury')->count();
            $others_summons = DB::table("summons")->Where("category", 'Others')->count();

            return view("panel.dashboard", Compact('courts', 'judges', 'court_cases', 'jurors', 'summons', 'questionnaires', 'jury_summons', 'others_summons', 'female', 'male'));
        }
        if (Auth::user()->hasRole('judge')) {
            // Get Courts count
            $courts = DB::table('assign_judges')
                ->join('judges', 'judges.id', '=', 'assign_judges.judge_id')
                ->where('judges.user_id', Auth::user()->id)
                ->distinct('assign_judges.court_id')
                ->count('assign_judges.court_id');
            $court_cases = DB::table("assign_judges")->join('judges', 'judges.id', 'assign_judges.judge_id')->where('judges.user_id', Auth::user()->id)->count(); //dd($courts);die;
            $judges = DB::table("judges")->count();
            $jurors = DB::table("jurors")->count();
            $summons = DB::table("summons")->count();
            $questionnaires = DB::table("questionnaires")->count();
            $jury_summons = DB::table("summons")->Where("category", 'Jury')->count();
            $others_summons = DB::table("summons")->Where("category", 'Others')->count();

            return view("panel.dashboard", Compact('courts', 'judges', 'court_cases', 'jurors', 'summons', 'questionnaires', 'jury_summons', 'others_summons'));
        }

        if (Auth::user()->hasRole('jury')) {
            // Get Courts count
            $courts = DB::table('assign_juries')
                ->join('jurors', 'jurors.id', '=', 'assign_juries.juror_id')
                ->where('jurors.user_id', Auth::user()->id)
                ->distinct('assign_juries.court_id')
                ->count('assign_juries.court_id');

            // Get Summon count
            $summons = DB::table('summons')
                ->where('email', Auth::user()->email)
                ->count();

            $court_cases = DB::table("assign_juries")
                ->join('jurors', 'jurors.id', 'assign_juries.juror_id')
                ->where('jurors.user_id', Auth::user()->id)->count();

            $quiz = DB::table('assign_quizzes')->where('user_id', Auth::user()->id)->where('status', 'pending')->count();

            return view("panel.dashboard", Compact('courts', 'court_cases', 'summons', 'quiz'));
        }
    }
}
