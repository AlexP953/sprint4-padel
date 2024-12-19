<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Pistas de Pádel') }}
      </h2>
  </x-slot>

  <div class="m-4">
      <livewire:create-reservation /> 
  </div>
</x-app-layout>
