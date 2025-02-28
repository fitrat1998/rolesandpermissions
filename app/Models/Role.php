<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
        use HasFactory;
    use HasPermissions;

    protected $fillable = ['name', 'guard_name'];
}
