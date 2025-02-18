<x-layout title="Perfil">

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">

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
                    @if($user->persona && $user->persona->empleado)
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                @include('profile.partials.update-laboral-information-form')
                            </div>
                        </div>
                    @endif
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
