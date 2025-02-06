<x-layout title="Recuperar Contraseña">
    <div class="alert alert-info text-center">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Solo ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class=" text-center align-items-center" style="min-height: 500px">
        <form method="POST" action="{{ route('password.email') }}" class="text-center">
            @csrf
    
            <!-- Email Address -->
            <div>
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('name')" />
            </div>
    
            <div>
                <button type="submit" class="btn btn-success">
                    {{ __('Enviar enlace de restablecimiento') }}
                </button>
            </div>
        </form>
    </div>
    
</x-layout>

