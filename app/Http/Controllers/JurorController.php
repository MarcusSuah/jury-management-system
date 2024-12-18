<?php

namespace App\Http\Controllers;

use App\Models\Juror;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\AccountReponseMail;
use Illuminate\Support\Facades\Mail;

class JurorController extends Controller
{
    public function list()
    {
        $jurors_count = DB::table('jurors')->count();
        $jurors = Juror::getRecord();
        $result = [];
        if (!empty($jurors)) {
            foreach ($jurors as $data) {
                if (!empty($data->user_id)) {
                    $user = User::findOrFail($data->user_id);
                    if (!empty($user)) {
                        $result[] = [
                            'id' => $user->id ?? '',
                            'juror_id' => $data->id ?? '',
                            'name' => $data->name ?? '',
                            'race' => $data->race ?? '',
                            'gender' => $data->gender ?? '',
                            'dob' => $data->dob ?? '',
                            'country' => $data->country ?? '',
                            'city' => $data->city ?? '',
                            'district' => $data->district ?? '',
                            'nationality' => $data->nationality ?? '',
                            'email' => $data->email ?? '',
                            'contact' => $data->contact ?? '',
                            'address' => $data->address ?? '',
                            'occupation' => $data->occupation ?? '',
                            'work_add' => $data->work_add ?? '',
                            'created_at' => $data->created_at ?? '',
                            'status' => $user->status ?? '0',
                            'role_status' => (!empty($user) && $user->hasRole('jury')) ? 'yes' : 'no',
                            'approved' => (!empty($user) && $user->hasRole('jury') || !empty($user->status)) ? 'yes' : 'no',
                        ];
                    }
                }
            }
        }

        return view("panel.jury.list", compact('result', 'jurors_count'));
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
            return redirect()->back()->withErrors($validatedFields->errors())->withInput()->with("error", "Juror registration was unsuccessful");
        } else {
            // Create Juror user account
            $user = new User;
            $user->status = '0';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            //$user->assignRole('jury');
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

            if (!empty($user->email)) {
                $final_msg['body'] = "Dear $user->name, \n Thank you for applying for a Jury account. We'll review your application and notify you.";
                Mail::to($user->email)->send(new AccountReponseMail($final_msg));
            }

            return redirect()->back()->with("success", "Thank you for applying for a Jury account. We'll review your application and notify you.");
        }
    }
    public function edit($id)
    {
        $data = Juror::getSingle($id);
        return view("panel.jury.edit", compact('data'));
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

    /*
    * Method to display all jury register form
    */
    public function registerJuror()
    {
        return view("panel.jury.register-jury");
    }

    /*
    * Method to approve jury
    */
    public function approveJury($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->assignRole('jury');
                $user->status = 1;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Jury account has been approved. Kindly proceed to login with your registered credentials.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/jury")->with("success", "Jury account successfully approved");
            } else {
                abort(404, 'Jury Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }

    /*
    * Method to deny judge
    */
    public function denyJury($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->status = 2;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Jury account has been denied.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/jury")->with("success", "Jury account successfully denied");
            } else {
                abort(404, 'Jury Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }

    /*
    * Method to approve jury
    */
    public function activateJury($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->assignRole('jury');
                $user->status = 1;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Jury account has been activated.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/jury")->with("success", "Jury account successfully approved");
            } else {
                abort(404, 'Jury Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }

    /*
    * Method to deny judge
    */
    public function disableJury($id)
    {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $user = User::findOrFail($id);
            if (!empty($user)) {
                $user->roles()->detach();
                $user->status = 3;
                $user->update();

                if (!empty($user->email)) {
                    $final_msg['body'] = "Dear $user->name, \n Please be informed that your Jury account has been disabled.";
                    Mail::to($user->email)->send(new AccountReponseMail($final_msg));
                }

                return redirect("panel/jury")->with("success", "Jury account successfully disabled");
            } else {
                abort(404, 'Jury Not Found.');
            }
        } else {
            abort(403, 'Unauthorized access.');
        }
    }
}
