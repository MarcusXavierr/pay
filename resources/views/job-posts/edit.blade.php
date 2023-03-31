<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crie um Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <!-- edit.blade.php -->
      <form action="aaa" method="POST">
        @csrf
        @method('PUT')

        <div>
          <label for="title">Título:</label>
          <input type="text" id="title" name="title" value="{{ $jobPost->title }}">
        </div>

        <div>
          <label for="description">Descrição:</label>
          <textarea id="description" name="description">{{ $jobPost->description }}</textarea>
        </div>

        <div>
          <label for="job_category">Categoria:</label>
          <select id="job_category" name="job_category">
            @foreach ($jobCategories as $category)
              <option value="{{ $category }}" {{ $jobPost->job_category == $category ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <button type="submit">Atualizar</button>
        </div>
      </form>
    </div>
</x-app-layout>
