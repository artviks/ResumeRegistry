<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\Education;
use App\Models\Person;
use App\Models\Resume;
use App\Models\WorkExperience;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ResumeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        Resume::factory()->create();

        $response = $this->get(route('resumes'));

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
                ->has('meta')
                ->has('links')
            );
    }

    public function testShow(): void
    {
        $resume = Resume::factory()
            ->has(Person::factory())
            ->has(Education::factory())
            ->has(WorkExperience::factory())
            ->has(Address::factory())
            ->create();

        $response = $this->get(route('resume.show', $resume));
        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json
                ->where('data.id', $resume->id)
                ->where('data.person.id', $resume->person->id)
                ->etc()
            );
    }

    public function testStore(): void
    {
        $resume = Resume::factory()
            ->has(Person::factory())
            ->has(Education::factory())
            ->has(WorkExperience::factory())
            ->has(Address::factory())
            ->create();
        $resume = Resume::findOrFail($resume->id);

        $response = $this->post(route('resume.store'), $resume->toArray());

        $response
            ->assertStatus(200);
    }

    public function testEdit(): void
    {
        $resume = Resume::factory()
            ->has(Person::factory())
            ->has(Education::factory())
            ->has(WorkExperience::factory())
            ->has(Address::factory())
            ->create();

        $resume = Resume::findOrFail($resume->id);
        $resume->person->name = 'John Doe';
        $response = $this->put(route('resume.edit'), $resume->toArray());
        $response
            ->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $resume = Resume::factory()
            ->has(Person::factory())
            ->has(Education::factory())
            ->has(WorkExperience::factory())
            ->has(Address::factory())
            ->create();

        $response = $this->delete(route('resume.destroy', $resume));
        $response
            ->assertStatus(200);
    }
}
