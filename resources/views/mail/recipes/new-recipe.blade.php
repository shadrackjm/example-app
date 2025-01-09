@component('mail::message')

A new recipe has been shared with you!

## {{ $recipeName }}

{{ $recipeDescription }}

@component('mail::button', ['url' => url('/user/dashboard')])
View Recipe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent