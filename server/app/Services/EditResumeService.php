<?php


namespace App\Services;


use App\Http\Requests\StoreResumeRequest;
use App\Models\Address;
use App\Models\Education;
use App\Models\Person;
use App\Models\Resume;
use App\Models\WorkExperience;
use DB;

class EditResumeService
{
    public function execute(StoreResumeRequest $request): void
    {
        $resume = Resume::findOrFail($request->id);

        Person::updateOrCreate($request->input('person'));

        $this->deleteEdu($request, $resume->id);

        foreach ($request->input('education') as $education)
        {
            Education::updateOrCreate([
                'id' => $education['id'] ?? null
            ], [
                'resume_id' => $resume->id,
                'school' => $education['school'],
                'faculty' => $education['faculty'],
                'field_of_study' => $education['field_of_study'],
                'degree' => $education['degree'],
                'start_year' => $education['start_year'],
                'end_year' => $education['end_year'],
                'description' => $education['description']
            ]);
        }

        $this->deleteExp($request, $resume->id);

        foreach ($request->input('work_experience') as $experience)
        {
            WorkExperience::updateOrCreate([
                'id' => $experience['id'] ?? null
            ], [
                'resume_id' => $resume->id,
                'title' => $experience['title'],
                'company' => $experience['company'],
                'location' => $experience['location'],
                'start_date' => $experience['start_date'],
                'end_date' => $experience['end_date'],
                'employment_schedule' => $experience['employment_schedule'],
                'description' => $experience['description']
            ]);
        }

        Address::updateOrCreate($request->input('address'));

        $resume->touch();
    }

    private function deleteEdu(StoreResumeRequest $request, int $resumeId): void
    {
        $dbEdu = DB::table('education')->where('resume_id', '=', $resumeId)->pluck('id');

        $requestedEdu = [];
        foreach ($request->input('education') as $education) {
            $requestedEdu[] = $education['id'];
        }

        $deleteId = array_diff($dbEdu->toArray(), $requestedEdu);
        foreach ($deleteId as $id) {
            Education::destroy($id);
        }
    }

    private function deleteExp(StoreResumeRequest $request, int $resumeId): void
    {
        $dbEdu = DB::table('work_experiences')->where('resume_id', '=', $resumeId)->pluck('id');

        $requestedEdu = [];
        foreach ($request->input('work_experience') as $education) {
            $requestedEdu[] = $education['id'];
        }

        $deleteId = array_diff($dbEdu->toArray(), $requestedEdu);
        foreach ($deleteId as $id) {
            WorkExperience::destroy($id);
        }
    }
}
