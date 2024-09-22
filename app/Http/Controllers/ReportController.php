<?php

namespace App\Http\Controllers;

use App\Mail\SummonMail;
use App\Models\Summon;
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
    public function courtReport(){
        return view("panel.report.court-report");
    }

     /*
    * Method to generate court report
    **/
    public function generateCourtReport(Request $request){

        $court_type = $request->input('type');

            if ($court_type == 'any') {
                $court_list = DB::table('courts')->get();
            }else{
                $court_list = DB::table('courts')->where('type',$court_type)->get();
            }
            
            $courts = [];
            $no = 1;
            if (!empty($court_list)) {
                $courts_count = count($court_list);
               foreach($court_list as $court){
                    $courts[] = [
                        'sno'   => $no++,
                        'name' => (!empty($court->name))? $court->name : '',
                        'type' => (!empty($court->type))? $court->type : '',
                        'category' => (!empty($court->category))? $court->category : '',
                        'location' => (!empty($court->location))? $court->location : '',
                        'created_at' => (!empty($court->created_at))? $court->created_at : '',
                    ]; 
                }
               // dd($courts);die;
                if(!empty($courts)){
                    $pdf= PDF::loadView('panel.report.court-report-pdf',['data'=>$courts],compact('courts_count'));
                    return $pdf->stream('court-report.pdf');
                }else{
                    return redirect()->back()->with('success', 'No court data found');
                }
                
            }else{
                return redirect()->back()->with('success', 'No court data found');
            }
        exit;
    }

    /*
    * Method to display case report filter
    **/
    public function caseReport(){
        return view("panel.report.case-report");
    }

     /*
    * Method to generate case report
    **/
    public function generateCaseReport(Request $request){

        $case_type = $request->input('case_type');
        $status = $request->input('status');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
//dd($from_date);die;
        $cases_list = DB::table('court_cases');
        if($case_type != 'any'){
            $cases_list->where('case_type', $case_type);
        }
        if($status != 'any'){
            $cases_list->where('status', $status);
        }
        if($from_date != ''){
            $date = strtotime($from_date);
            $date = date('Y-m-d', $date);

            $cases_list->where('court_date', '>=', $date);
        }

        if($to_date != ''){
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
               foreach($cases_list as $case){
                    $cases[] = [
                        'sno'   => $no++,
                        'title' => (!empty($case->title))? $case->title : '',
                        'case_no' => (!empty($case->case_no))? $case->case_no : '',
                        'case_type' => (!empty($case->case_type))? $case->case_type : '',
                        'status' => (!empty($case->status))? $case->status : '',
                        'court_date' => (!empty($case->court_date))? $case->court_date : '',
                    ]; 
                }
               // dd($cases);die;
                if(!empty($cases)){
                    $pdf= PDF::loadView('panel.report.case-report-pdf',['data'=>$cases],compact('cases_count'));
                    return $pdf->stream('case-report.pdf');
                }else{
                    return redirect()->back()->with('success', 'No case data found');
                }
                
            }else{
                return redirect()->back()->with('success', 'No case data found');
            }
        exit;
    }
}
