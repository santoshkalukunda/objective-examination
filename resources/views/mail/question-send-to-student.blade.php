<x-mail::message>
# Dear {{$user->name}},

To view your questions

<x-mail::button :url="route('examinations.generateUrl',[$user, $token])" >
Questions Link
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
