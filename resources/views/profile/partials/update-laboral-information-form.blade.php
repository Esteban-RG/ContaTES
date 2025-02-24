<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información laboral') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza tu información laboral") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <input type="hidden" name="table" value="laboral">

        <div>
            <x-input-label :value="__('Matricula')" />
            <x-text-input type="text" class="mt-1 block w-full" :value="old('matricula', $user->persona->empleado->matricula)" readonly />
        </div>

        <div>
            <x-input-label  :value="__('Plaza')" />
            <x-text-input type="text" class="mt-1 block w-full" :value="old('plaza', $user->persona->empleado->plaza->nombre)" readonly />
        </div>


        <div class="mt-3">
            <label for="curp" class="form-label">CURP</label>
            <input class="form-control" type="file" id="curp" name="curp" accept=".pdf">
            @if($user->persona->empleado->curp != null)
            <p class="mb-2"><strong>CURP:</strong> <a href="{{ asset('storage/'.$user->persona->empleado->curp) }}" class="text-decoration-none">Ver CURP</a></p>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('curp')" />
        </div>

        <div class="mt-3">
            <label for="rfc" class="form-label">RFC</label>
            <input class="form-control" type="file" id="rfc" name="rfc" accept=".pdf">
            @if($user->persona->empleado->rfc != null)
            <p class="mb-2"><strong>RFC:</strong> <a href="{{ asset('storage/'.$user->persona->empleado->rfc) }}" class="text-decoration-none">Ver RFC</a></p>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('rfc')" />
        </div>

        <div class="mt-3">
            <label for="nss" class="form-label">NSS</label>
            <input class="form-control" type="file" id="nss" name="nss" accept=".pdf">
            @if($user->persona->empleado->nss != null)
            <p class="mb-2"><strong>NSS:</strong> <a href="{{ asset('storage/'.$user->persona->empleado->nss) }}" class="text-decoration-none">Ver NSS</a></p>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('nss')" />

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Listo.') }}</p>
            @endif
        </div>
    </form>
</section>
