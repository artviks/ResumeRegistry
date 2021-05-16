<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resume extends Model
{
    use HasFactory;

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
