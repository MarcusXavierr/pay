<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Models\JobContractType;
use App\Models\JobPost;
use App\Services\ManageJobPostService;
use Exception;

class JobPostController extends Controller
{
    public function index()
    {
        $jobPosts = JobPost::paginate(10);
        return view('job-posts.index', compact('jobPosts'));
    }

    public function create()
    {
        $jobCategories = JobContractType::all();
        return view('job-posts.create', compact('jobCategories'));
    }

    public function store(JobPostRequest $request)
    {
        try {
            app(ManageJobPostService::class)->createJob($request->validated());

            return redirect()->route('manage-job-posts.index')->with('success', 'Vaga de emprego criada com sucesso!');
        } catch (Exception $e) {
            report($e);

            return redirect()->route('manage-job-posts.index')->with('error', 'Erro ao criar vaga de emprego');
        }
    }

    public function edit($id)
    {
        $jobPost = JobPost::find($id);
        $jobCategories = JobContractType::all();
        return view('job-posts.edit', compact('jobPost', 'jobCategories'));
    }

    public function update(JobPostRequest $request, $id)
    {
        try {
            app(ManageJobPostService::class)->updateJob($id, $request->validated());

            return redirect()->route('manage-job-posts.index')->with('success', 'Vaga atualizada com sucesso');
        } catch (Exception $e) {
            report($e);

            return redirect()->route('manage-job-posts.index')->with('error', 'Erro ao atualizar vaga');
        }
    }

    public function destroy($id)
    {
        try {
            app(ManageJobPostService::class)->deleteJob($id);

            return redirect()->route('manage-job-posts.index')->with('success', 'Vaga deletada com sucesso');
        } catch (Exception $e) {
            report($e);

            return redirect()->route('manage-job-posts.index')->with('error', 'Erro ao deletar vaga');
        }
    }
}
