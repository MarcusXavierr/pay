<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use Exception;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::paginate(10);

        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(CandidateRequest $request)
    {
        try {
            Candidate::create($request->validated());

            return redirect()->route('candidates.index')->with('success', 'Candidato criado com sucesso');
        } catch (Exception $e) {
            report($e);
            return redirect()->route('candidates.index')->with('error', 'Erro ao criar candidato');
        }
    }

    public function edit(string $id)
    {
        $candidate = Candidate::find($id);
        return view('candidates.edit', compact('candidate'));
    }

    public function update(CandidateRequest $request, string $id)
    {
        try {
            $candidate = Candidate::find($id);
            $candidate->update($request->validated());

            return redirect()->route('candidates.index')->with('success', 'Candidato atualizado com sucesso');
        } catch (Exception $e) {
            report($e);
            return redirect()->route('candidates.index')->with('error', 'Erro ao atualizar candidato');
        }
    }

    public function destroy(string $id)
    {
        try {
            $candidate = Candidate::find($id);
            $candidate->delete();

            return redirect()->route('candidates.index')->with('success', 'Candidato deletado com sucesso');
        } catch (Exception $e) {
            report($e);
            return redirect()->route('candidates.index')->with('error', 'Erro ao deletar candidato');
        }
    }
}
