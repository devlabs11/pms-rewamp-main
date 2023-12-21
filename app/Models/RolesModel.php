<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class RolesModel extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    protected  $table = "roles";
    protected $guarded = [];
}
