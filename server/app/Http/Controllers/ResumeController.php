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
use Illuminate\Http\Resources\Json\JsonResource;

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
        $resume = new Resume();
//        Person::create(
//            'resume_id'$resume->id
//            $request->input('person')
//        );
        Education::create($request->input('education'));
        WorkExperience::create($request->input('work_experience'));
        Address::create($request->input('address'));
    }

    public function edit(Request $request)
    {
        $resume = Resume::findOrFail($request->id);
        $resume->touch();

        Person::updateOrCreate(['resume_id' => $request->id], $request->input('person'));
        Education::updateOrCreate(['resume_id' => $request->id], $request->input('education'));
        WorkExperience::updateOrCreate(['resume_id' => $request->id], $request->input('work_experience'));
        Address::updateOrCreate(['resume_id' => $request->id], $request->input('address'));
    }

    public function show(int $id): ResumeResource
    {
        $resume = Resume::findOrFail($id);

        return new ResumeResource($resume);
    }

    public function destroy($id): void
    {
        Resume::destroy($id);
        Person::destroy(['resume_id'=>$id]);
        Education::destroy(['resume_id'=>$id]);
        WorkExperience::destroy(['resume_id'=>$id]);
        Address::destroy(['resume_id'=>$id]);
    }
}
