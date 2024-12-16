<x-app-layout>
    <x-slot name="header">
        <div>
            <span class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Dashboard') }}</span>
            <button id="btnCreateReservation" class="btn">Crear Reserva</button>
            <button id="btnMyReservations" class="btn">Mis Reservas</button>
            <span onclick="logout()">Logout</span>
        </div>

    </x-slot>

    @push('content')
        <div id="createReservationContent" style="display: none;" class="m-4">
            <livewire:create-reservation />
        </div>
    @endpush

    @push('content')
        <div id="myReservationsContent" style="display: none;" class="m-4">
            <livewire:my-reservations />
        </div>
    @endpush

    @stack('content')
</x-app-layout>
