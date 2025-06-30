<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscussionPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'discussion_id',
        'content',
        'from_id',
        'to_id',
    ];

    public function discussion() : BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }

    public function from() : BelongsTo
    {
        return $this->belongsTo(Patient::class, 'from_id');
    }

    public function to() : BelongsTo
    {
        return $this->belongsTo(User::class, 'to_id');
    }
}
