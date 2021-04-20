<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'age', 'details', 'image'];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
