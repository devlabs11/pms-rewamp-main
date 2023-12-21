<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "permissions";

    protected $guarded=[];

    public function fetchPermission()
    {
        return PermissionModel::all();
    }
}
