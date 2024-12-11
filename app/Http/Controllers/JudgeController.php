<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judge;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\AccountReponseMail;
use Illuminate\Support\Facades\Mail;

class JudgeController extends Controller
{
    /*
    * Method to display all judge record
    */
    public function list()
    {
        $result = [];
        $data["getRecord"] = Judge::getRecord();

        if (!empty($data["getRecord"])) {
            foreach ($data["getRecord"] as $data) {
                $user = User::findOrFail($data->user_id);
                if (!empty($user)) {
                    $result[] = [
                        'id' => $user->id ?? '',
                        'name' => $data->name ?? '',
                        'gender' => $data->gender ?? '',
                        'dob' => $data->dob ?? '',
                        'country' => $data->country ?? '',
                        'city' => $data->city ?? '',
                        'email' => $data->email ?? '',
                        'contact' => $data->contact ?? '',
                        'address' => $data->address ?? '',
                        'specialization' => $data->specialization ?? '',
                        'yr_exp' => $data->yr_exp ?? '',
                        'created_at' => $data->created_at ?? '',
                        'status' => $user->status ?? '0',
                        'role_status' => (!empty($user) && $user->hasRole('judge')) ? 'yes' : 'no',
                        'approved' => (!empty($user) && $user->hasRole('judge') || !empty($user->status)) ? 'yes' : 'no',
                    ];
                }
            }
        }
        return view("panel.judge.list", compact('result'));
    }
    public function add()
    {
        return view("panel.judge.add");
    }
    public function insert(Request $request)
    {
        $validatedFields = Validator::make($request->all(), [
            'email' => ['required', 'string', 'max:30', 'unique:users']
        ]);
        if ($validatedFields->fails()) {
            return redirect()->back()->withErrors($validatedFields->errors())->withInput()->with("error", "Your Judge account was not registered");
        } else {
            // Create Judge user account
            $user = new User;
            $user->name = $request->name;
            $user->status = '0';
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            //$user->assignRole('judge');
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

            return redirect()->back()->with("success", "Thank you for applying for a Judge account. We'll review your application and notify you.");
        }
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

    /*
    * Method to display all judge register form
    */
    public function registerJudge()
    {
        return view("panel.judge.register-judge");
    }

    /*
    * Method to approve judge
    */
    public function approveJudge($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->assignRole('judge');
                $user->status = 1;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Judge account has been approve. Kindly proceed to login with your registered credentials.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/judge")->with("success", "Judge account successfully approved");
            } else {
                abort(404, 'Judge Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }

    /*
    * Method to deny judge
    */
    public function denyJudge($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->status = 2;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Judge account has been denied.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/judge")->with("success", "Judge account successfully denied");
            } else {
                abort(404, 'Judge Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }

    /*
    * Method to approve jury
    */
    public function activateJudge($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->assignRole('judge');
                $user->status = 1;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Judge account has been activated.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/judge")->with("success", "Judge account successfully approved");
            } else {
                abort(404, 'Judge Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }

    /*
    * Method to deny judge
    */
    public function disableJudge($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->roles()->detach();
                $user->status = 3;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Judge account has been disabled.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/judge")->with("success", "Judge account successfully disabled");
            } else {
                abort(404, 'Judge Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }
}
