<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Panel de administrador') }}
      </h2>
  </x-slot>

  <div class="m-4">
      <livewire:admin-panel /> 
  </div>
</x-app-layout>
