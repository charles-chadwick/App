<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discussion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'on',
        'on_id',
        'status',
        'title',
    ];

    public function discussable() : MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'on', 'on_id');
    }
}
