<div class="flex flex-col items-center space-y-4 w-full">
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full max-w-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col items-center w-full max-w-md">
        <label for="date" class="font-bold">Seleccione una fecha:</label>
        <input 
            type="date" 
            id="date" 
            required 
            name="date" 
            class="border border-gray-300 rounded p-2 w-full"
            wire:model="date">
        @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="w-full max-w-md">
        <h3 class="font-bold text-lg mb-2">Horas disponibles:</h3>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($availableHours as $hora => $pistas)
                <button 
                    type="button" 
                    class="px-4 py-2 rounded 
                        {{ isset($availableHours[$hora]) && count(array_filter($availableHours[$hora])) > 0 
                            ? ($hora === $selectedHour ? 'bg-green-600 text-white' : 'bg-green-200') 
                            : 'bg-gray-300 text-gray-500' }}" 
                    wire:click="setReservation('{{ $hora }}', null)"
                    {{ count(array_filter($availableHours[$hora])) > 0 ? '' : 'disabled' }}>
                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $hora)->format('h:i A') }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="w-full max-w-md">
        <h3 class="font-bold text-lg mb-2">Pistas disponibles:</h3>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($allCourts as $court)
                <button 
                    type="button" 
                    class="px-4 py-2 rounded 
                        {{ isset($availableHours[$selectedHour][$court['id']]) && $availableHours[$selectedHour][$court['id']] 
                            ? ($selectedCourt === $court['id'] ? 'bg-green-600 text-white' : 'bg-green-200') 
                            : 'bg-gray-300 text-gray-500' }}" 
                    wire:click="setReservation('{{ $selectedHour }}', {{ $court['id'] }})"
                    {{ isset($availableHours[$selectedHour][$court['id']]) && $availableHours[$selectedHour][$court['id']] ? '' : 'disabled' }}>
                    {{ $court['nombre'] }}
                </button>
            @endforeach
        </div>
    </div>
    

    <form method="POST" action="{{ route('reservations.store') }}" class="w-full max-w-md">
        @csrf
        <input type="hidden" name="date" value="{{ $date }}">
        <input type="hidden" name="hour" value="{{ $selectedHour }}">
        <input type="hidden" name="pista" value="{{ $selectedCourt }}">
        <button 
            type="submit" 
            class="bg-blue-500 text-white px-4 py-2 rounded w-full mt-4"
            {{ $selectedHour && $selectedCourt ? '' : 'disabled' }}>
            Reservar
        </button>
    </form>
</div>
