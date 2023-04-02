<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crie um Job') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">
      <!-- edit.blade.php -->
      <form action="{{ route('candidates.update', $candidate->id) }}" method="POST" data-theme="light" class="p-10 flex flex-col gap-4">
        @csrf
        @method('PUT')
        <div class="form-control">
          <label for="name" class="label"><span class="label-text">Nome</span></label>
          <input type="text" id="name" name="name" class="input input-bordered w-full max-w-xs" value="{{ $candidate->name }}">
        </div>

        <div class="form-control">
          <label for="email" class="label"><span class="label-text">Email</span></label>
          <input type="text" id="email" name="email" class="input input-bordered w-full max-w-xs" value="{{ $candidate->email }}">
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
      </form>
    </div>
</x-app-layout>
