<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información personal') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza tu información personal") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <input type="hidden" name="table" value="personal">
        
        <div>
            <x-input-label for="name" :value="__('Nombre(s)')" />
            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre',  $persona->nombre ?? '')" required autofocus autocomplete="nombre" />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>

        <div>
            <x-input-label for="ap_paterno" :value="__('Apellido Paterno')" />
            <x-text-input id="ap_paterno" name="ap_paterno" type="text" class="mt-1 block w-full" :value="old('ap_paterno', $persona->ap_paterno ?? '')" required autofocus autocomplete="ap_paterno" />
            <x-input-error class="mt-2" :messages="$errors->get('ap_paterno')" />
        </div>

        <div>
            <x-input-label for="ap_materno" :value="__('Apellido Materno')" />
            <x-text-input id="ap_materno" name="ap_materno" type="text" class="mt-1 block w-full" :value="old('ap_materno',  $persona->ap_materno ?? '')" required autofocus autocomplete="ap_materno" />
            <x-input-error class="mt-2" :messages="$errors->get('ap_materno')" />
        </div>

        <div>
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('ap_materno',  $persona->telefono ?? '')" required autofocus autocomplete="telefono" />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>

        <div>
            <x-input-label for="telefono" :value="__('Genero')" />
            <div>
                <input class="form-check-input" type="radio" name="genero" id="masculino" value="M" {{ isset($persona) && $persona->genero == 'M' ? 'checked' : '' }}>
                <label class="form-check-label" for="masculino">
                Masculino
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="genero" id="femenino" value="F" {{ isset($persona) && $persona->genero == 'F' ? 'checked' : '' }}>
                <label class="form-check-label" for="femenino">
                Femenino
                </label> 
            </div>         
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

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
