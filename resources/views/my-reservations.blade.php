<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Mis reservas') }}
      </h2>
  </x-slot>

  <div class="m-4">
      <livewire:my-reservations />
  </div>
</x-app-layout>