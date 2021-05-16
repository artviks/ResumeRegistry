<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Education
 *
 * @property int $id
 * @property int $resume_id
 * @property string $school
 * @property string $faculty
 * @property string $field_of_study
 * @property string $degree
 * @property int $start_year
 * @property int $end_year
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resume $resume
 * @method static \Database\Factories\EducationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereEndYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereFaculty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereFieldOfStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereStartYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Education extends Model
{
    use HasFactory;

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
