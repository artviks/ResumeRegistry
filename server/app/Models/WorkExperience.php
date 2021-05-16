<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\WorkExperience
 *
 * @property int $id
 * @property int $resume_id
 * @property string $title
 * @property string $company
 * @property string $location
 * @property string $start_date
 * @property string|null $end_date
 * @property string $employment_schedule
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resume $resume
 * @method static \Database\Factories\WorkExperienceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereEmploymentSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereResumeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WorkExperience extends Model
{
    use HasFactory;

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
