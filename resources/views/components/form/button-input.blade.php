<button
    type="{{empty($type) ? 'submit' : $type }}"
    class="btn {{ $type == 'submit' ? 'btn-primary' : 'btn-primary' }}"
>{{ $slot }}</button>
