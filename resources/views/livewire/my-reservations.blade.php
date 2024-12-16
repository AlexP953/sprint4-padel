<div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4">

    @foreach($reservations as $reservation)
        <div class="bg-white border border-gray-300 shadow-sm rounded p-4" onclick="getInfo( {{$reservation}})">
            <p>Reserva ID: {{ $reservation->id }}</p>
            <p>Fecha Inicio: {{ $reservation->fecha_inicio }}</p>
            <p>Fecha Final: {{ $reservation->fecha_final }}</p>
            <p>Pista: {{ $reservation->id_pista }}</p>
            <span onclick="openDeleteModal({{ $reservation->id }})">
                <i class="fa-regular fa-trash-can"></i>
            </span>        
        </div>
    @endforeach
    @include('livewire.modal')
</div>

