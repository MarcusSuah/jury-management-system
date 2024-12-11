<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;
use Carbon\Carbon;


class UserController extends Controller
{
    // public function list()
    // {
    //     return view("panel.user.list");
    // }


    public function list()
    {
        $data["getRecord"] = RoleModel::getRecord();
        $data["getRecord"] = User::getRecord();
        return view("panel.user.list", $data);
    }
    public function add()
    {
        return view("panel.user.add");
    }
    public function insert(Request $request)
    {
        $save = new User;
        $save->name = $request->name;
        $save->guard_name = 'web';
        $save->save();
        return redirect("panel/user")->with("success", "User successfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        return view("panel.user.edit", $data);
    }

    public function update($id, Request $request)
    {
        $save = User::getSingle($id);
        $save->name = $request->name;
        $save->save();
        return redirect("panel/user")->with("success", " updated successfully ");
    }
    public function delete($id)
    {
        $save = User::getSingle($id);
        $save->delete();
        return redirect("panel/user")->with("success", " deleted successfully ");
    }
}
