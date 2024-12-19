<div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4 m-8">

    @foreach($reservations as $reservation)
        <div class="bg-white border border-gray-300 shadow-sm rounded p-4">
            <img src="court.jpg"/>
            <p>Dia: {{ $reservation->day }}</p>
            <p>Hora: {{ $reservation->hora_inicio }} - {{ $reservation->hora_final }}</p>
            <p>Pista {{ $reservation->id_pista }}</p>
            <div class="flex justify-end mt-2">
                <span onclick="openDeleteModal({{ $reservation->id }})" >
                    <i class="fa-regular fa-trash-can"></i>
                </span>        
            </div>
        </div>
    @endforeach
    @include('livewire.modal')
</div>

