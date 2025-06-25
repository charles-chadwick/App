<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Base extends Model implements HasMedia
{
    use InteractsWithMedia, LogsActivity, SoftDeletes;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable, [
            'created_by_id',
            'updated_by_id',
            'deleted_by_id',
        ]);
    }

    public function createdBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function deletedBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by_id');
    }

    /**
     * Activity Log
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                         ->useLogName('System');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
