@component('mail::message')
    # Introduction
    Body message
    @component('mail::button', ['url' => ''])Home@endcomponent
    Thanks,<br>
    {{ config('app.name') }}<br>
@endcomponent
