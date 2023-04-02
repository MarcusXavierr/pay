<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Candidatos') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">
      <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
          @if (session()->has('success'))
          <div class="p-3 text-green-700 bg-green-300 rounded">
              {{ session()->get('success') }}
          </div>
          @elseif (session()->has('error'))
          <div class="p-3 text-red-700 bg-red-300 rounded">
              {{ session()->get('error') }}
          </div>
          @endif
      </div>
      <a class="btn btn-primary my-6" href="{{ route('candidates.create') }}">Criar Candidato</a>
      <div class="overflow-x-auto max-x-screen" data-theme="light">
        <table class="table w-full table-auto">
          <thead>
            <tr>
              <th>Ação</th>
              <th>Nome</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($candidates as $candidate)
              <tr>
                <td class="flex gap-4">
                  <a href="{{ route('candidates.edit', $candidate->id) }}">
                    <button type="submit" class="btn btn-warning">Editar</button>
                  </a>

                  <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error">Excluir</button>
                  </form>
                </td>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->email }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @if ($candidates->hasPages())
        <div class="flex justify-between mt-4">
          @if ($candidates->onFirstPage())
            <span class="px-2 py-1 text-gray-600 rounded-md cursor-not-allowed">
              Anterior
            </span>
          @else
            <a href="{{ $candidates->previousPageUrl() }}" class="px-2 py-1 text-blue-600 rounded-md hover:text-white hover:bg-blue-600">
              Anterior
            </a>
          @endif

          <div class="flex-1 flex justify-center">
            @foreach ($candidates->getUrlRange(1, $candidates->lastPage()) as $page => $url)
              @if ($page == $candidates->currentPage())
                <span class="px-2 py-1 text-white bg-blue-600 rounded-md">{{ $page }}</span>
              @else
                <a href="{{ $url }}" class="px-2 py-1 text-blue-600 rounded-md hover:text-white hover:bg-blue-600">{{ $page }}</a>
              @endif
            @endforeach
          </div>

          @if ($candidates->hasMorePages())
            <a href="{{ $candidates->nextPageUrl() }}" class="px-2 py-1 text-blue-600 rounded-md hover:text-white hover:bg-blue-600">
              Próximo
            </a>
          @else
            <span class="px-2 py-1 text-gray-600 rounded-md cursor-not-allowed">
              Próximo
            </span>
          @endif
        </div>
      @endif
    </div>
</x-app-layout>
