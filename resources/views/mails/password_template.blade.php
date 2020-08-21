@component('mail::message')
Hello **{{$email}}**,  {{-- use double space for line break --}}
Thank you for choosing Fox Media!

Here's your password for future use: {{$password}}

Sincerely,  
The Fox Media team.
@endcomponent