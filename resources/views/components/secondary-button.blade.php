<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-light btn-sm shadow-sm text-uppercase']) }}>
    {{ $slot }}
</button>
