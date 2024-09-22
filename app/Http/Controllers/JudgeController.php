<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judge;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class JudgeController extends Controller
{
    public function list()
    {
        $data["getRecord"] = Judge::getRecord();
        return view("panel.judge.list", $data);
    }
    public function add()
    {
        return view("panel.judge.add");
    }
    public function insert(Request $request)
    {
        // Create Judge user account
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole('judge');
        $user->save();

        $save = new Judge;
        $save->user_id = $user->id;
        $save->name = $request->name;
        $save->gender = $request->gender;
        $save->dob = $request->dob;
        $save->country = $request->country;
        $save->city = $request->city;
        $save->email = $request->email;
        $save->contact = $request->contact;
        $save->address = $request->address;
        $save->specialization = $request->specialization;
        $save->yr_exp = $request->yr_exp;
        $save->save();

        return redirect("panel/judge")->with("success", "Judge successfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = Judge::getSingle($id);
        return view("panel.judge.edit", $data);
    }

    public function update($id, Request $request)
    {
        $save = Judge::getSingle($id);
        $save->name = $request->name;
        $save->gender = $request->gender;
        $save->dob = $request->dob;
        $save->country = $request->country;
        $save->city = $request->city;
        $save->email = $request->email;
        $save->contact = $request->contact;
        $save->address = $request->address;
        $save->specialization = $request->specialization;
        $save->yr_exp = $request->yr_exp;
        $save->save();
        return redirect("panel/judge")->with("success", "Judge updated successfully ");
    }
    public function delete($id)
    {
        $save = Judge::getSingle($id);
        $save->delete();
        return redirect("panel/judge")->with("success", "Judge deleted successfully ");
    }
}
