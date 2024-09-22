<?php

namespace App\Http\Controllers;

use App\Models\Juror;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class JurorController extends Controller
{
    public function list()
    {
        $jurors = DB::table('jurors')->count();
        $data = Juror::getRecord();
        return view("panel.jury.list", compact('data', 'jurors'));
    }
    public function add()
    {
        return view("panel.jury.add");
    }
    public function insert(Request $request)
    {
        $validatedFields = Validator::make($request->all(), [
            'email'  => ['required', 'string', 'max:30', 'unique:users'],
            'name' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:6']
        ]);
        if ($validatedFields->fails()) {
            \Session::flash('msgErr','Oops! user was not registered, try again.' );
            return redirect()->back()->withErrors($validatedFields->errors())->withInput();
        }else{
            // Create Juror user account
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->assignRole('jury');
            $user->save();

            $save = new Juror;
            $save->user_id = $user->id;
            $save->name = $request->name;
            $save->email = $request->email;
            $save->dob = $request->dob;
            $save->gender = $request->gender;
            $save->contact = $request->contact;
            $save->address = $request->address;
            $save->occupation = $request->occupation;
            $save->work_add = $request->work_add;
            $save->race = $request->race;
            $save->nationality = $request->nationality;
            $save->country = $request->country;
            $save->city = $request->city;
            $save->district = $request->district;
            $save->save();

            return redirect("panel/jury")->with("success", "Juror successfully created");
        }
    }
    public function edit($id)
    {
        $data['getRecord'] = Juror::getSingle($id);
        return view("panel.jury.edit", $data);
    }

    public function update($id, Request $request)
    {
        $save = Juror::getSingle($id);
        $save->name = $request->name;
        $save->email = $request->email;
        $save->dob = $request->dob;
        $save->gender = $request->gender;
        $save->contact = $request->contact;
        $save->address = $request->address;
        $save->occupation = $request->occupation;
        $save->work_add = $request->work_add;
        $save->race = $request->race;
        $save->nationality = $request->nationality;
        $save->country = $request->country;
        $save->city = $request->city;
        $save->district = $request->district;
        $save->save();
        return redirect("panel/jury")->with("success", "Juror updated successfully");
    }
    public function delete($id)
    {
        $save = Juror::getSingle($id);
        $save->delete();
        return redirect("panel/jury")->with("success", "Juror deleted successfully ");
    }
}
