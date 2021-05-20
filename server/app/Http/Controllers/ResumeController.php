<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResumeRequest;
use App\Http\Resources\ResumeResource;
use App\Models\Address;
use App\Models\Education;
use App\Models\Person;
use App\Models\Resume;
use App\Models\WorkExperience;
use App\Services\EditResumeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResumeController extends Controller
{
    private EditResumeService $editResumeService;

    public function __construct(EditResumeService $editResumeService)
    {
        $this->editResumeService = $editResumeService;
    }

    public function index(): AnonymousResourceCollection
    {
        $resume = Resume::orderBy('updated_at', 'desc')
            ->paginate(10);

        return ResumeResource::collection($resume);
    }

    public function store(StoreResumeRequest $request): void
    {
        $resume = new Resume();
        $resume->save();

        $resume->person()->create($request->input('person'));

        if ($request->input('education')[0]) {
            foreach ($request->input('education') as $education)
            {
                $resume->education()->create($education);
            }
        }

        if ($request->input('work_experience')[0]) {
            foreach ($request->input('work_experience') as $experience)
            {
                $resume->workExperience()->create($experience);
            }
        }

        $resume->address()->create($request->input('address'));
    }

    public function edit(StoreResumeRequest $request): void
    {
        $this->editResumeService->execute($request);
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
