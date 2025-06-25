<?php

namespace App\Models;

use App\Models\Traits\Attributes\HasAvatar;
use App\Models\Traits\Attributes\IsPerson;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Base
{
    use HasFactory, HasAvatar, IsPerson;

    protected $fillable = [
        'status',
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'gender',
        'dob',
        'email',
        'password',
        'created_by_id',
        'updated_by_id',
        'deleted_by_id',
    ];

    public function getDobAttribute($value) : string {
        return Carbon::parse($value)->format('m/d/Y');
    }
}
