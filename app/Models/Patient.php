<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'email',
        'password',
        'created_by_id',
        'updated_by_id',
        'deleted_by_id',
    ];

}
