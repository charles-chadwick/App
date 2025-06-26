<?php

namespace App\Models;

use App\Models\Traits\Attributes\HasAvatar;
use App\Models\Traits\Attributes\IsPerson;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Base
{
    use HasAvatar, HasFactory, IsPerson;

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
        'password'
    ];

    public function getDobAttribute($value): string
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
}
