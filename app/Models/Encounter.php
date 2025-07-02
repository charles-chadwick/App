<?php

namespace App\Models;

use App\Enums\EncounterStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encounter extends Base
{
    use HasFactory;

    public function __construct(array $attributes = []) { parent::__construct($attributes); }

    protected $fillable = [
        'patient_id',
        'owner_id',
        'type',
        'date_of_service',
        'status',
        'title',
        'content',
    ];

    public function casts() : array
    {
        return [
            'status' => EncounterStatus::class,
        ];
    }

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
