<?php

namespace App\Http\Controllers;

use App\Mail\SummonMail;
use App\Models\Summon;
use App\Models\User;
use PDF;
use Gemini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{

    /*
    * Method to display court report filter
    **/
    public function courtReport()
    {
        return view("panel.report.court-report");
    }

    /*
    * Method to generate court report
    **/
    public function generateCourtReport(Request $request)
    {

        $court_type = $request->input('type');

        if ($court_type == 'any') {
            $court_list = DB::table('courts')->get();
        } else {
            $court_list = DB::table('courts')->where('type', $court_type)->get();
        }

        $courts = [];
        $no = 1;
        if (!empty($court_list)) {
            $courts_count = count($court_list);
            foreach ($court_list as $court) {
                $courts[] = [
                    'sno'   => $no++,
                    'name' => (!empty($court->name)) ? $court->name : '',
                    'type' => (!empty($court->type)) ? $court->type : '',
                    'category' => (!empty($court->category)) ? $court->category : '',
                    'location' => (!empty($court->location)) ? $court->location : '',
                    'created_at' => (!empty($court->created_at)) ? $court->created_at : '',
                ];
            }
            // dd($courts);die;
            if (!empty($courts)) {
                $pdf = PDF::loadView('panel.report.court-report-pdf', ['data' => $courts], compact('courts_count'));
                return $pdf->stream('court-report.pdf');
            } else {
                return redirect()->back()->with('success', 'No court data found');
            }
        } else {
            return redirect()->back()->with('success', 'No court data found');
        }
        exit;
    }

    /*
    * Method to display case report filter
    **/
    public function caseReport()
    {
        return view("panel.report.case-report");
    }

    /*
    * Method to generate case report
    **/
    public function generateCaseReport(Request $request)
    {

        $case_type = $request->input('case_type');
        $status = $request->input('status');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $cases_list = DB::table('court_cases');
        if ($case_type != 'any') {
            $cases_list->where('case_type', $case_type);
        }
        if ($status != 'any') {
            $cases_list->where('status', $status);
        }
        if ($from_date != '') {
            $date = strtotime($from_date);
            $date = date('Y-m-d', $date);

            $cases_list->where('court_date', '>=', $date);
        }

        if ($to_date != '') {
            $date = strtotime($to_date);
            $date = date('Y-m-d', $date);

            $cases_list->where('court_date', '<=', $date);
        }

        $cases_list = $cases_list->get();

        //dd($cases_list);die;
        $cases = [];
        $no = 1;
        if (!empty($cases_list)) {
            $cases_count = count($cases_list);
            foreach ($cases_list as $case) {
                $cases[] = [
                    'sno'   => $no++,
                    'title' => (!empty($case->title)) ? $case->title : '',
                    'case_no' => (!empty($case->case_no)) ? $case->case_no : '',
                    'case_type' => (!empty($case->case_type)) ? $case->case_type : '',
                    'status' => (!empty($case->status)) ? $case->status : '',
                    'court_date' => (!empty($case->court_date)) ? $case->court_date : '',
                ];
            }
            // dd($cases);die;
            if (!empty($cases)) {
                $pdf = PDF::loadView('panel.report.case-report-pdf', ['data' => $cases], compact('cases_count'));
                return $pdf->stream('case-report.pdf');
            } else {
                return redirect()->back()->with('success', 'No case data found');
            }
        } else {
            return redirect()->back()->with('success', 'No case data found');
        }
        exit;
    }

    /*
    * Method to display summon report filter
    **/
    public function summonReport()
    {
        $jurors = User::getAllUsers();
        $users = [];
        if (!empty($jurors)) {
            foreach ($jurors as $user) {
                if ($user->hasRole('jury')) {
                    $users[] = [
                        'email' => $user->email,
                        'name' => $user->name . ' | ' . $user->email,
                    ];
                }
            }
        }
        return view("panel.report.summon-report", compact('users'));
    }

    /*
    * Method to generate summon report
    **/
    public function generateSummonReport(Request $request)
    {
        $user_email = $request->input('user');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $summon_list = DB::table('summons');
        if ($user_email != 'any') {
            $summon_list->where('email', $user_email);
        }
        if ($from_date != '') {
            $date = strtotime($from_date);
            $date = date('Y-m-d', $date);

            $summon_list->where('created_at', '>=', $date);
        }

        if ($to_date != '') {
            $date = strtotime($to_date);
            $date = date('Y-m-d', $date);

            $summon_list->where('created_at', '<=', $date);
        }

        $summon_list = $summon_list->get();
        $summons = [];
        $no = 1;
        if (!empty($summon_list)) {
            $summons_count = count($summon_list);
            foreach ($summon_list as $summon) {
                $summons[] = [
                    'sno'   => $no++,
                    'name' => (!empty($summon->name)) ? $summon->name : '',
                    'email' => (!empty($summon->email)) ? $summon->email : '',
                    'category' => (!empty($summon->category)) ? $summon->category : '',
                    'address' => (!empty($summon->address)) ? $summon->address : '',
                    'message' => (!empty($summon->message)) ? base64_decode($summon->message) : '',
                    'date' => (!empty($summon->date)) ? $summon->date : '',
                ];
            }
            // dd($summons);die;
            if (!empty($summons)) {
                $pdf = PDF::loadView('panel.report.summon-report-pdf', ['data' => $summons], compact('summons_count'));
                return $pdf->stream('summon-report.pdf');
            } else {
                return redirect()->back()->with('success', 'No summon data found');
            }
        } else {
            return redirect()->back()->with('success', 'No summon data found');
        }
        exit;
    }

    /*
    * Display Jury report filter
    **/
    public function juryReport()
    {
        return view("panel.report.jury-report");
    }

    /*
    * Method to generate jury report
    **/
    public function generateJuryReport(Request $request)
    {
        $status = $request->input('status');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $jury_list = DB::table('jurors');
        if ($status != 'any') {
            $jury_list->join('users', 'users.id', 'jurors.user_id');
            $jury_list->where('status', $status);
        }
        if ($from_date != '') {
            $date = strtotime($from_date);
            $date = date('Y-m-d', $date);

            $jury_list->where('created_at', '>=', $date);
        }

        if ($to_date != '') {
            $date = strtotime($to_date);
            $date = date('Y-m-d', $date);

            $jury_list->where('created_at', '<=', $date);
        }

        $jury_list = $jury_list->get();
        $jurors = [];
        $no = 1;
        if (!empty($jury_list)) {
            $jury_count = count($jury_list);
            foreach ($jury_list as $jury) {
                $jurors[] = [
                    'sno'   => $no++,
                    'name' => (!empty($jury->name)) ? $jury->name : '',
                    'email' => (!empty($jury->email)) ? $jury->email : '',
                    'dob' => (!empty($jury->dob)) ? $jury->dob : '',
                    'gender' => (!empty($jury->gender)) ? $jury->gender : '',
                    'contact' => (!empty($jury->contact)) ? $jury->contact : '',
                    'address' => (!empty($jury->address)) ? $jury->address : '',
                    'created_at' => (!empty($jury->created_at)) ? $jury->created_at : '',
                ];
            }
            // dd($jury);die;
            if (!empty($jurors)) {
                $pdf = PDF::loadView('panel.report.jury-report-pdf', ['data' => $jurors], compact('jury_count'));
                return $pdf->stream('jury-report.pdf');
            } else {
                return redirect()->back()->with('success', 'No jury data found');
            }
        } else {
            return redirect()->back()->with('success', 'No jury data found');
        }
        exit;
    }

    /*
    * Display Judge report filter
    **/
    public function judgeReport()
    {
        return view("panel.report.judge-report");
    }

    /*
    * Method to generate Judge report
    **/
    public function generateJudgeReport(Request $request)
    {
        $status = $request->input('status');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $judge_list = DB::table('judges');
        if ($status != 'any') {
            $judge_list->join('users', 'users.id', 'judges.user_id');
            $judge_list->where('status', $status);
        }
        if ($from_date != '') {
            $date = strtotime($from_date);
            $date = date('Y-m-d', $date);

            $judge_list->where('created_at', '>=', $date);
        }

        if ($to_date != '') {
            $date = strtotime($to_date);
            $date = date('Y-m-d', $date);

            $judge_list->where('created_at', '<=', $date);
        }

        $judge_list = $judge_list->get();
        $judges = [];
        $no = 1;
        if (!empty($judge_list)) {
            $judge_count = count($judge_list);
            foreach ($judge_list as $judge) {
                $judges[] = [
                    'sno'   => $no++,
                    'name' => (!empty($judge->name)) ? $judge->name : '',
                    'email' => (!empty($judge->email)) ? $judge->email : '',
                    'dob' => (!empty($judge->dob)) ? $judge->dob : '',
                    'gender' => (!empty($judge->gender)) ? $judge->gender : '',
                    'contact' => (!empty($judge->contact)) ? $judge->contact : '',
                    'address' => (!empty($judge->address)) ? $judge->address : '',
                    'created_at' => (!empty($judge->created_at)) ? $judge->created_at : '',
                ];
            }
            if (!empty($judges)) {
                $pdf = PDF::loadView('panel.report.judge-report-pdf', ['data' => $judges], compact('judge_count'));
                return $pdf->stream('judge-report.pdf');
            } else {
                return redirect()->back()->with('success', 'No judge data found');
            }
        } else {
            return redirect()->back()->with('success', 'No jury data found');
        }
        exit;
    }
}
