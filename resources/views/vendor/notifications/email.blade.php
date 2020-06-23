@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hola!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos,<br>
Equipo de SeJu Digital.
@endif

{{-- Subcopy --}}
@slot('subcopy')
@isset($actionText)
@lang(
    "Si tenés problemas al hacer click en \":actionText\" copia y pega el siguiente link\n".
    'en tu navegador web',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endisset
<br>
<span>Este mensaje ha sido enviado desde una dirección de correo que no admite respuestas, si necesitás contactarte con nosotros, por favor hazlo a través de otro canal.</span>
@endslot
@endcomponent