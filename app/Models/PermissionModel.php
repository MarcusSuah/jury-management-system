<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LDAP\Result;

class PermissionModel extends Model
{
    use HasFactory;
    protected $table = "permission";

    static public function getSingle($id)
    {
        return RoleModel::find($id);
    }

    static public function getRecord()
    {
        $getPermision = PermissionModel::groupBy("groupby")->get();
        $result = array();
        foreach ($getPermision as $value) {
            $getPermisionGroup = PermissionModel::getPermisionGroup($value->groupby);
            $data = array();
            $data["id"] = $value->id;
            $data["name"] = $value->name;
            $group = array();
            foreach ($getPermisionGroup as $valueG) {
                $dataG = array();
                $dataG["id"] = $valueG->id;
                $dataG["name"] = $valueG->name;
                $group[] = $dataG;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }
    static public function getPermisionGroup($groupby)
    {
        return PermissionModel::where("groupby", '=', $groupby)->get();
    }
}
