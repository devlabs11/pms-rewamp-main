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

    protected $fillable = ['name','title', 'guard_name'];

    public function fetchPermission()
    {
        return PermissionModel::all();
    }
}
