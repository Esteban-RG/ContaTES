<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">{{ __('Autenticación de Dos Factores (2FA)') }}</div>
    
                    <div class="card-body">
                        <p>Por favor, ingresa el código de un solo uso (OTP) generado por Google Authenticator.</p>
    
                        <form method="POST" action="{{ route('2fa.verify') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="one_time_password" class="col-md-4 col-form-label text-md-right">{{ __('Código OTP') }}</label>
    
                                <div class="col-md-6">
                                    <input id="one_time_password" type="text" class="form-control @error('one_time_password') is-invalid @enderror" name="one_time_password" required autofocus>
    
                                    @error('one_time_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verificar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-layout>