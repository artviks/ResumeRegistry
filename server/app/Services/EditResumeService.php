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

        Person::updateOrCreate([
            'id' => $request->input('person.id')
        ], [
            'resume_id' => $resume->id,
            'name' => $request->input('person.name'),
            'phone_number' => $request->input('person.phone_number'),
            'email' => $request->input('person.email'),
            'links' => $request->input('person.links'),
        ]);

        $this->delete($request, $resume->id, 'education', Education::class);

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

        $this->delete($request, $resume->id, 'work_experience', WorkExperience::class);

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

        Address::updateOrCreate([
            'id' => $request->input('address.id')
        ], [
            'resume_id' => $resume->id,
            'address' => $request->input('address.address'),
            'country' => $request->input('address.country'),
            'postal_code' => $request->input('address.postal_code')
        ]);

        $resume->touch();
    }

    private function delete(StoreResumeRequest $request, int $resumeId, string $prop, string $class): void
    {
        $dbEdu = $class::where('resume_id', '=', $resumeId)->pluck('id');

        $requestedEdu = [];
        foreach ($request->input($prop) as $education) {
            $requestedEdu[] = $education['id'];
        }

        $deleteId = array_diff($dbEdu->toArray(), $requestedEdu);
        foreach ($deleteId as $id) {
            $class::destroy($id);
        }
    }
}
