@component('mail::message')
Hello **{{$email}}**,  {{-- use double space for line break --}}
Thank you for choosing Fox Media!

Please fill out this form to let us know about your business strategy.
Form link: <a href="{{url('/strategy/new/'.$email)}}" target="_blank" class="btn btn-primary btn-md">Click Here</a>

Sincerely,  
The Fox Media team.
@endcomponent