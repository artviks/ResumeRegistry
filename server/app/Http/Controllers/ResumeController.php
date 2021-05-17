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
        $resumes = Resume::orderBy('created_at', 'desc')->paginate(10);

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
        Person::where('resume_id', $id)->delete();
        Education::where('resume_id', $id)->delete();
        WorkExperience::where('resume_id', $id)->delete();
        Address::where('resume_id', $id)->delete();
        Resume::destroy($id);
    }
}
