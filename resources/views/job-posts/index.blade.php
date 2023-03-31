<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Jobs') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <!-- index.blade.php -->

      <table>
        <thead>
          <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jobPosts as $post)
            <tr>
              <td>{{ $post->title }}</td>
              <td>{{ $post->description }}</td>
              <td>{{ $post->job_category }}</td>
              <td>
                <a href="{{ route('manage-job-posts.edit', $post->id) }}">
                  <button type="submit">Editar</button>
                </a>

                <form action="{{ route('manage-job-posts.destroy', $post->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      @if ($jobPosts->hasPages())
        <div class="flex justify-between mt-4">
          @if ($jobPosts->onFirstPage())
            <span class="px-2 py-1 text-gray-600 rounded-md cursor-not-allowed">
              Anterior
            </span>
          @else
            <a href="{{ $jobPosts->previousPageUrl() }}" class="px-2 py-1 text-blue-600 rounded-md hover:text-white hover:bg-blue-600">
              Anterior
            </a>
          @endif

          <div class="flex-1 flex justify-center">
            @foreach ($jobPosts->getUrlRange(1, $jobPosts->lastPage()) as $page => $url)
              @if ($page == $jobPosts->currentPage())
                <span class="px-2 py-1 text-white bg-blue-600 rounded-md">{{ $page }}</span>
              @else
                <a href="{{ $url }}" class="px-2 py-1 text-blue-600 rounded-md hover:text-white hover:bg-blue-600">{{ $page }}</a>
              @endif
            @endforeach
          </div>

          @if ($jobPosts->hasMorePages())
            <a href="{{ $jobPosts->nextPageUrl() }}" class="px-2 py-1 text-blue-600 rounded-md hover:text-white hover:bg-blue-600">
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
