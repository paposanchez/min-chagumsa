<span class="label
label-{{ $color && array_key_exists($code, $color) ? $color[$code] : 'default'}}
">
        {{ $slot }}
</span>
