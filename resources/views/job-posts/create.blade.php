<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crie um Job') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">
      <!-- create.blade.php -->
      <form action="{{ route('manage-job-posts.store') }}" method="POST" data-theme="light" class="p-10 flex flex-col gap-4">
        @csrf
        <div class="form-control">
          <label for="title" class="label"><span class="label-text">Titulo</span></label>
          <input type="text" id="title" name="title" class="input input-bordered w-full max-w-xs">
        </div>

        <div class="form-control">
          <label for="description" class="label"><span class="label-text">Descrição</span></label>
          <textarea id="description" name="description" class="textarea textarea-bordered"></textarea>
        </div>

        <div class="form-control">
          <label for="job_category" class="label"><span class="label-text">Categoria</span></label>
          <select id="job_category" name="job_contract_type_id" class="select select-bordered w-full max-w-xs">
            @foreach ($jobCategories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Criar</button>
        </div>
      </form>
    </div>
</x-app-layout>
