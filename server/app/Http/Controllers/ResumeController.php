<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResumeResource;
use App\Models\Address;
use App\Models\Education;
use App\Models\Person;
use App\Models\Resume;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResumeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $resume = Resume::orderBy('created_at', 'desc')
            ->paginate(10);

        return ResumeResource::collection($resume);
    }

    public function store(Request $request): void
    {

    }

    public function show(int $id): ResumeResource
    {
        $resume = Resume::findOrFail($id);

        return new ResumeResource($resume);
    }

    public function destroy($id): void
    {

    }
}
