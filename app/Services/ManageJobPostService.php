<?php

namespace App\Services;

use App\Exceptions\DeleteItemException;
use App\Exceptions\UpdateItemException;
use App\Models\JobPost;

class ManageJobPostService
{
    public function createJob($data): void
    {
        JobPost::create($data);
    }

    public function updateJob($id, $data)
    {
        $job = JobPost::find($id);
        if (! $job) {
            throw new UpdateItemException("Cannot update job because it doesn't exists");
        }

        $updated = $job->update($data);

        if (! $updated) {
            throw new UpdateItemException("Cannot update job {$job->id}");
        }
    }

    public function deleteJob($id)
    {
        $job = JobPost::find($id);
        if (! $job) {
            throw new DeleteItemException("Cannot delete job, because it doesn't exists");
        }
        $deleted = $job->delete();

        if (! $deleted) {
            throw new DeleteItemException("Cannot delete job {$job->id}");
        }
    }
}
