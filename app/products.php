<?php

namespace App;

use App\Models\sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class products extends Model
{

    protected $guarded = [];

    public function section(): BelongsTo
    {
        return $this->belongsTo(sections::class);
    }

}
