<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success btn-sm mt-2']) }}>
    {{ $slot }}
</button>
