<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'faculty',
        'field_of_study',
        'degree',
        'start_year',
        'end_year',
        'description'
    ];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
