<div style="width: 50%; margin-left: 30px;">
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf

        <div>
            <label for="date">Fecha</label>
            <input type="date" id="date" required name="date" class="border border-gray-300 rounded p-2 w-full"
                   wire:model="date" wire:change="updateAvailableHours">
            @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <h3 class="font-bold mb-2">Seleccione una hora</h3>
            <table class="border-collapse border border-gray-300 w-full text-center">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">Hora</th>
                        @for ($i = 1; $i <= 8; $i++)
                            <th class="border border-gray-300 p-2">Pista {{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availableHours as $hora => $pistas)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $hora }}</td>
                            @foreach ($pistas as $pista => $disponible)
                            <td class="border border-gray-300 p-2">
                                @if ($disponible)
                                    <button type="button" class="px-2 py-1 rounded"
                                            @if ($hora == $selectedHour && $pista == $selectedCourt)
                                                style="background-color: #a8a74a;" 
                                            @else 
                                                style="background-color: #38A169;" 
                                            @endif
                                            wire:click="setReservation('{{ $hora }}', {{ $pista }})">
                                        @if ($hora == $selectedHour && $pista == $selectedCourt)
                                            Seleccionado
                                        @else
                                            Disponible
                                        @endif
                                    </button>
                                @else
                                    <span class="text-red-500">Reservada</span>
                                @endif
                            </td>
                            
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <input type="hidden" name="hour" value="{{ $hour }}">
        <input type="hidden" name="pista" value="{{ $court }}">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4" {{ $hour && $court ? '' : 'disabled' }}>
            Reservar
        </button>
    </form>
</div>
