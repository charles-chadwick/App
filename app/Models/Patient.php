<?php

namespace App\Models;

use App\Enums\PatientGender;
use App\Enums\PatientStatus;
use App\Models\Traits\Attributes\HasAvatar;
use App\Models\Traits\Attributes\IsPerson;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'password',
    ];

    public function casts(): array
    {
        return [
            'status' => PatientStatus::class,
            'gender' => PatientGender::class,
        ];
    }

    public function dob(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('m/d/Y') : null,
            set: fn ($value) => $value ? Carbon::parse($value)->toDateTimeString() : null,
        );
    }
}
