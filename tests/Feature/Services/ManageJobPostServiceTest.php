<?php

namespace Tests\Feature\Services;

use App\Exceptions\DeleteItemException;
use App\Exceptions\UpdateItemException;
use App\Models\JobContractType;
use App\Models\JobPost;
use App\Services\ManageJobPostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageJobPostServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = JobContractType::create([ 'name' => 'clt' ]);
    }

    public function test_create_post_successfully()
    {
        $data = [
            'title' => 'this is a title',
            'description' => 'whatever',
            'job_contract_type_id' => $this->category->id
        ];

        app(ManageJobPostService::class)->createJob($data);

        $this->assertCount(1, JobPost::all());
    }

    public function test_update_post()
    {
        $job = JobPost::factory()->create();
        $data = ['title' => 'this is a title'];

        app(ManageJobPostService::class)->updateJob($job->id, $data);
        $this->assertCount(1, JobPost::all());

        $this->assertEquals($data['title'], JobPost::first()->title);
    }

    public function test_throw_exception_when_cannot_update()
    {
        JobPost::factory()->create();
        $data = ['title_2' => 'this is a title'];

        $this->expectException(UpdateItemException::class);
        app(ManageJobPostService::class)->updateJob(10, $data);

    }

    public function test_delete_post()
    {
        $job = JobPost::factory()->create();

        app(ManageJobPostService::class)->deleteJob($job->id);
        $this->assertCount(0, JobPost::all());
    }

    public function test_throw_exception_when_cannot_delete()
    {
        JobPost::factory()->create();

        $this->expectException(DeleteItemException::class);
        app(ManageJobPostService::class)->deleteJob(10);
    }
}
