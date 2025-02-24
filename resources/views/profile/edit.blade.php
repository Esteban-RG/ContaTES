<x-layout title="Perfil">

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm mb-4">
                        

                        <div class="card-header">{{ __('Auntenticacion por dos pasos activada') }}</div>
        
                        <div class="card-body">
                            <p>Añade este codigo en Google Authenticator: <strong> {{ $secret }} </strong></p>
                            <p>No pierdas tu clave</p>
                        </div>
                        
                        <a class="btn btn-success m-3" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=es_MX&pli=1" target="_blank" >Descarga Google Authenticator</a>
                    </div>

                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-user-information-form')
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-personal-information-form')
                        </div>
                    </div>
                    
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>

</x-layout>
