<x-app-layout>
    <x-slot name="header">
        <div>
            <span class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Dashboard') }}</span>
            <span>Dashboard</span>
            <span onclick="logout()">Logout</span>
        </div>

    </x-slot>

    @push('content')
        <livewire:create-reservation />
    @endpush
</x-app-layout>
