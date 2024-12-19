<div class="bg-white shadow-md rounded-lg">
    <div class="flex border-b">
        <button id="tab-reservas" class="tab-button px-6 py-3 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none" onclick="setActiveTab('reservas')">
            Reservas
        </button>
        <button id="tab-usuarios" class="tab-button px-6 py-3 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none" onclick="setActiveTab('usuarios')">
            Usuarios
        </button>
        <button id="tab-pistas" class="tab-button px-6 py-3 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none" onclick="setActiveTab('pistas')">
            Pistas
        </button>
    </div>

    <div class="p-4">
        <div id="content-reservas" class="tab-content hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white border-collapse border border-gray-200 shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="px-6 py-3 text-left">Nombre</th>
                            <th class="px-6 py-3 text-left">Pista</th>
                            <th class="px-6 py-3 text-left">Inicio</th>
                            <th class="px-6 py-3 text-left">Final</th>
                            <th class="px-6 py-3 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reserva)
                            <tr class="border-t border-gray-200">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $reserva->nombre }} {{ $reserva->apellido }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $reserva->court->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $reserva->fecha_inicio }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $reserva->fecha_final }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <span onclick="openDeleteModal('reservation',{{ $reserva->id }})">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>

        <div id="content-usuarios" class="tab-content hidden">
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto bg-white border-collapse border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Nombre</th>
                            <th class="px-6 py-3 text-left">Apellido</th>
                            <th class="px-6 py-3 text-left">Rol</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-t border-gray-200">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $user->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $user->nombre }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $user->apellido }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $user->rol }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $user->number_phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                    </div>

        <div id="content-pistas" class="tab-content hidden">
            <div class="flex justify-end mb-4">
                <button onclick="openCreateCourtModal()" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                    Crear Nueva Pista
                </button>
            </div>
            
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto bg-white border-collapse border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Nombre</th>
                            <th class="px-6 py-3 text-left">Tipo de Pista</th>
                            <th class="px-6 py-3 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courts as $court)
                            <tr class="border-t border-gray-200">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $court->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $court->nombre }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $court->tipo_pista }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <span onclick="openDeleteModal('court',{{ $court->id }})">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('livewire.modal')

<div id="createModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Crear Nueva Pista</h2>
        <form action="{{ route('courts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Pista</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="tipo_pista" class="block text-sm font-medium text-gray-700">Tipo de Pista</label>
                <select id="tipo_pista" name="tipo_pista" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="Padel">Pádel</option>
                    <option value="Tenis">Tenis</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-700 rounded-lg">
                    Cancelar
                </button>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-700 rounded-lg">
                    Crear Pista
                </button>
            </div>
        </form>
    </div>
</div>
</div>
