<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" x-data="formHandler()" id="profile-form">
        @csrf
        
        @method('patch')

        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $user->nombre)" required autofocus autocomplete="nombre" />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>

        <div>
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full" :value="old('apellido', $user->apellido)" required autofocus autocomplete="apellido" />
            <x-input-error class="mt-2" :messages="$errors->get('apellido')" />
        </div>

        <div>
            <x-input-label for="number_phone" :value="__('Número de teléfono')" />
            <x-text-input id="number_phone" name="number_phone" type="text" class="mt-1 block w-full" :value="old('number_phone', $user->number_phone)" required autofocus autocomplete="number_phone" />
            <x-input-error class="mt-2" :messages="$errors->get('number_phone')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autofocus autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button x-bind:disabled="!isDirty" x-bind:class="isDirty ? 'bg-blue-500 cursor-pointer' : 'bg-gray-400 cursor-not-allowed'" id="save-button">

            {{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
