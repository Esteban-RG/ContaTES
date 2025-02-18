@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <div {{ $attributes->merge(['class' => 'alert alert-danger']) }} role="alert">      
                {{ $message }}
        </div>
    @endforeach
@endif
