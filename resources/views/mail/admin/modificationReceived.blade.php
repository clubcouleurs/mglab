
@component('mail::message', [
								'sujet' => $sujet,
								])






# Bonjour M. Administrator,

Le client <strong><i>{{ $client }}</i></strong> vient de demander une modification pour sa création  {{$conception->type}}.

Merci de regarder pour la suite.

@component('mail::button', ['url' => config('app.url') . '/conceptions/' . $conception->id ])
Consulter le projet
@endcomponent
@endcomponent




