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
use App\Services\StoreResumeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResumeController extends Controller
{
    private EditResumeService $editResumeService;
    private StoreResumeService $storeResumeService;

    public function __construct(
        EditResumeService $editResumeService,
        StoreResumeService $storeResumeService
    )
    {
        $this->editResumeService = $editResumeService;
        $this->storeResumeService = $storeResumeService;
    }

    public function index(): AnonymousResourceCollection
    {
        return ResumeResource::collection(
            Resume::orderBy('updated_at', 'desc')
            ->paginate(10)
        );
    }

    public function store(StoreResumeRequest $request): void
    {
        $this->storeResumeService->execute($request);
    }

    public function edit(StoreResumeRequest $request): void
    {
        $this->editResumeService->execute($request);
    }

    public function show(int $id): ResumeResource
    {
        return new ResumeResource(
            Resume::findOrFail($id)
        );
    }

    public function destroy(int $id): void
    {
        Resume::destroy($id);
        Person::destroy(['resume_id'=>$id]);
        Education::destroy(['resume_id'=>$id]);
        WorkExperience::destroy(['resume_id'=>$id]);
        Address::destroy(['resume_id'=>$id]);
    }
}
