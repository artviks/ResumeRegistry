<?php


namespace App\Services;


use App\Http\Requests\StoreResumeRequest;
use App\Models\Resume;

class StoreResumeService
{
    public function execute(StoreResumeRequest $request): void
    {
        $resume = new Resume();
        $resume->save();

        $resume->person()->create($request->input('person'));

        if ($request->input('education')[0])
        {
            foreach ($request->input('education') as $education)
            {
                $resume->education()->create($education);
            }
        }

        if ($request->input('work_experience')[0])
        {
            foreach ($request->input('work_experience') as $experience)
            {
                $resume->workExperience()->create($experience);
            }
        }

        $resume->address()->create($request->input('address'));
    }

}
