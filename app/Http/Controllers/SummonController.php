<?php

namespace App\Http\Controllers;

use Gemini;
use App\Models\Summon;
use App\Mail\SummonMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SummonController extends Controller
{

    public function list()
    {
        $data["getRecord"] = Summon::getRecord();
        return view("panel.summon.list", $data);
    }
    public function add()
    {
        $courts = DB::table("courts")->get();
        $court_cases = DB::table("court_cases")->get();
        return view("panel.summon.add", compact("courts", "court_cases"));
    }
    public function insert(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "email" => "required",
                "address" => "required",
                "date" => "required",
                "court" => "required",
                "case" => "required",
            ],
            [
                "name.required" => "Please enter a Name",
                "email.required" => "Please enter an Email",
                "address.required" => "Please enter an address",
                "date.required" => "Please enter an date",
                "court.required" => "Please enter an Court",
                "case.required" => "Please enter an Case",
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with("error", "Summon was not sent");
        }
        $name = $request->input("name");
        $email = $request->input("email");
        $address = $request->input("address");
        $date = $request->input("date");

        $court = DB::table("courts")->Where('id', $request->input("court"))->get();
        $court_name = $court[0]->name;
        $court_location = $court[0]->location;
        $case = DB::table("court_cases")->Where('id', $request->input("case"))->select('title')->get();

        $msg = "Given the person name: $name, email: $email, summon date: $date, court name: $court_name, court address: $court_location, case: $case, and address: $address. Write a jury summon message directly using the provided credentials. Do not include jury requirements and other court detials excluding the court name and address. Also, do not include asterisk and align the salutation and body properly.";
        $api_key = getenv("GEMINI_API_KEY");
        $client = Gemini::client($api_key);
        $result = $client->geminiPro()->generateContent($msg);
        $final_msg = ['body' => $result->text()];

        $save = new Summon;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->category = $request->category;
        $save->address = $request->address;
        $save->date = $request->date;
        $save->message = (!empty($result->text())) ? base64_encode($result->text()) :'';
        $save->save();

        Mail::to($email)->send(new SummonMail($final_msg));
        return redirect("panel/summon")->with("success", "Summon successfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = Summon::getSingle($id);
        return view("panel.summon.edit", $data);
    }

    public function update($id, Request $request)
    {
        $save = Summon::getSingle($id);
        $save->name = $request->name;
        $save->email = $request->email;
        $save->address = $request->address;
        $save->date = $request->date;
        $save->save();
        return redirect("panel/summon")->with("success", "Summon updated successfully ");
    }
    public function delete($id)
    {
        $save = Summon::getSingle($id);
        $save->delete();
        return redirect("panel/summon")->with("success", "Summon deleted successfully ");
    }
}
