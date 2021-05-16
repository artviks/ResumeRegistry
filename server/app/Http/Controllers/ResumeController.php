<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResumeResource;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResumeController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        $resumes = Resume::all();

        return ResumeResource::collection($resumes);
    }

    public function store(Request $request): void
    {
        $resume = $request->isMethod('put') ?
            Resume::findOrFail($request->id) : new Resume();

        $resume->name = $request->name;
        $resume->person()->updateOrCreate($request->person);
        $resume->education()->updateOrCreate($request->education);
        $resume->workExperience()->updateOrCreate($request->workExperience);
        $resume->address()->updateOrCreate($request->address);

        $resume->save();
    }

    public function show(int $id): ResumeResource
    {
        $resume = Resume::findOrFail($id);

        return new ResumeResource($resume);
    }

    public function destroy($id): void
    {
        Resume::destroy($id);
    }
}
