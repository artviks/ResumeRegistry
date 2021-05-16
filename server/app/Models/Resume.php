<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Resume
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Education[] $education
 * @property-read int|null $education_count
 * @property-read \App\Models\Person|null $person
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WorkExperience[] $workExperience
 * @property-read int|null $work_experience_count
 * @method static \Database\Factories\ResumeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resume newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resume query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Resume extends Model
{
    use HasFactory;

    protected $with = ['person', 'education', 'workExperience', 'address'];

    public function person(): HasOne
    {
        return $this->hasOne(Person::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function workExperience(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
