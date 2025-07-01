<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encounter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'owner_id',
        'type',
        'date_of_service',
        'status',
        'title',
        'content',
    ];

    public function dateOfService() : Attribute {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('m/d/Y') : null,
            set: fn ($value) => $value ? Carbon::parse($value)->toDateTimeString() : null,
        );
    }

    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
