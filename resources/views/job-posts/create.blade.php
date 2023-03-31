<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crie um Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <!-- create.blade.php -->
      <form action="{{ route('manage-job-posts.store') }}" method="POST">
        @csrf
        <div>
          <label for="title">Título:</label>
          <input type="text" id="title" name="title">
        </div>

        <div>
          <label for="description">Descrição:</label>
          <textarea id="description" name="description"></textarea>
        </div>

        <div>
          <label for="job_category">Categoria:</label>
          <select id="job_category" name="job_category">
            @foreach ($jobCategories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <button type="submit">Criar</button>
        </div>
      </form>
    </div>
</x-app-layout>
