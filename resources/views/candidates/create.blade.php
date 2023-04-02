<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crie um Job') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">
      <form action="{{ route('candidates.store') }}" method="POST" data-theme="light" class="p-10 flex flex-col gap-4">
        @csrf
        <div class="form-control">
          <label for="name" class="label"><span class="label-text">Nome</span></label>
          <input type="text" id="name" name="name" class="input input-bordered w-full max-w-xs">
        </div>

        <div class="form-control">
          <label for="email" class="label"><span class="label-text">Email</span></label>
          <input type="text" id="email" name="email" class="input input-bordered w-full max-w-xs">
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Criar</button>
        </div>
      </form>
    </div>
</x-app-layout>
